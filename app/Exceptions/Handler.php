<?php

namespace App\Exceptions;

use App\Helpers\StringUtil;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

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
    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
    */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     * */
    public function render($request, Throwable $exception)
    {
        //simplifi this
        return parent::render($request, $exception);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response|void
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->expectsJson()){
            return abort(401, $exception->getMessage());
        }

        try {
            $token = auth()->refresh();
            return $request->withCookie(cookie(StringUtil::$TOKEN_USER, $token, config('jwt.ttl')));
        }catch (JWTException $exception){
            Log::notice($exception);
            return redirect()->guest(route('web.login'));
        }
    }
}
