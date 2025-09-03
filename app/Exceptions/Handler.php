<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (AuthenticationException $e, $request) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка авторизации',
                'error' => 'Необходимо авторизоваться для доступа к этому ресурсу',
                'code' => 401
            ], 401);
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // Всегда возвращаем JSON для API
        return response()->json([
            'success' => false,
            'message' => 'Ошибка авторизации',
            'error' => 'Для доступа к этому ресурсу требуется аутентификация',
            'code' => 401,
            'hint' => 'Используйте токен авторизации в заголовке Authorization: Bearer <token>'
        ], 401);
    }


}
