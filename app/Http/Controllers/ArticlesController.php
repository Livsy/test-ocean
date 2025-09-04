<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleIdRequest;
use App\Http\Requests\ArticleIndexRequest;
use App\Http\Requests\ArticleSearchRequest;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Articles;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArticleIndexRequest $request)
    {
        $request->validated();

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $articles = Articles::with('category')
            ->orderBy($request->input('sort_by', 'created_at'), $request->input('sort_order', 'desc'))
            ->paginate($perPage, ['*'], 'page', $page);

        return response()->json(['data' => $articles->items(),
            'pagination' => [
                'current_page' => $articles->currentPage(),
                'per_page' => $articles->perPage(),
                'total' => $articles->total(),
                'last_page' => $articles->lastPage(),
                'from' => $articles->firstItem(),
                'to' => $articles->lastItem(),
            ]
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        try {
            $article = Articles::create($request->validated());

            return response()->json(['message' => 'ok'], 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Ошибка валидации',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleIdRequest $request)
    {
        try {
            $request->validated();

            $article = Articles::with(['comments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->findOrFail($request->route('id'));

            return response()->json($article, 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Ошибка валидации',
                'errors' => $e->errors(),
            ], 422);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request)
    {
        try {
            $data = $request->validated();

            $article = Articles::where('id', $request->route('id'))->update($data);

            return response()->json(['message' => 'ok'], 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Ошибка валидации',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleIdRequest $request)
    {
        $request->validated();

        Articles::where('id', $request->route('id'))->delete();

        return response()->json(['message' => 'ok'], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function search(ArticleSearchRequest $request)
    {
        $request->validated();
        $data = Articles::where('title', 'like', '%' . $request->input('title') . '%')->get();
        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
