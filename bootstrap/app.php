<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function (){
            Route::prefix('admin')
                ->middleware(['web', 'auth','verified_mobile','admin'])
                ->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin'=>\App\Http\Middleware\AdminMiddleware::class,
            'verified_mobile'=>\App\Http\Middleware\MobileVerificatedMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

//        $exceptions->render(function (\Illuminate\Validation\ValidationException $exception , Request $request) {
//            if($request->is('api/*')){
//                return response()->json([
//                    'result' => false,
//                    'message' => $exception->getMessage(),
//                    'data' => []
//                ],\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
//            }
//        });

        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "دیتای درخواستی پیدا نشد",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_NOT_FOUND);
            }
        });

        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "متد ارسال شده صحیح نمی باشد",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_METHOD_NOT_ALLOWED);
            }
        });

        $exceptions->render(function (\Illuminate\Validation\UnauthorizedException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "نیاز به احراز هویت می باشد",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
        });

        $exceptions->render(function (\Illuminate\Auth\AuthenticationException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "توکن اشتباه می باشد",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
        });

//        $exceptions->respond(function (Response $response) {
//            if($response->getStatusCode() === 500){
//
//                    return response()->json([
//                        'result' => false,
//                        'message' => "خطای سمت سرور",
//                        'data' => []
//                    ],500);
//
//            }
//
//            return  $response;
//        });
    })->create();
