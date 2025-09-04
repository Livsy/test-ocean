<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
        try {
            $article = Comments::create($request->validated());

            return response()->json(['message' => 'ok'], 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Ошибка валидации',
                'errors' => $e->errors(),
            ], 422);
        }
    }
}
