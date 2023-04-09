<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Mockery\Matcher\Not;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->error(
                trans('messages.validation'),
                trans('messages.validation_error'),
                400,
                'request failed to validate',
                $exception->errors()
            );
        } elseif ($exception instanceof NotFoundHttpException) {
            return response()->error(
                trans('messages.route'),
                trans('messages.route_does_not_exist'),
                404,
                'route not found'
            );
        } elseif ($exception instanceof ModelNotFoundException) {
            return response()->error(
                trans('messages.model'),
                trans('messages.model_not_found'),
                404,
                'model does not exists in database'
            );
        } elseif ($exception instanceof GithubApiException) {
            return response()->error(
                trans('messages.internal'),
                trans('messages.github_api_issue'),
                500,
                'github api issue'
            );
        } elseif ($exception instanceof NotImplementedException) {
            return response()->error(
                trans('messages.internal'),
                trans('messages.not_implemented'),
                500,
                'not implemented'
            );
        }

        return response()->error(
            trans('messages.exception'),
            trans('messages.global_exception'),
            500,
            $exception->getMessage()
        );

        return parent::render($request, $exception);
    }
}
