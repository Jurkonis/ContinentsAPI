<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'No '.lcfirst(substr($exception->getModel(),
                strrpos($exception->getModel(),'\\') + 1)).' found!'
            ],
                404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['message' => $exception->getMessage()], 405);
         }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'message' => 'Route do not exist!'
            ],
                404);
        }
        return parent::render($request, $exception);
    }
}
