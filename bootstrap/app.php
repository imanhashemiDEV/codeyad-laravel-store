<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function (){
            Route::prefix('admin')
                ->middleware(['web', 'auth','verified','verified_mobile','admin'])
                ->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin'=>\App\Http\Middleware\AdminMiddleware::class,
            'verified_mobile'=>\App\Http\Middleware\MobileVerificatedMiddleware::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
        $middleware->trustProxies(at: '*');
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

        $exceptions->render(function (NotFoundHttpException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "دیتای درخواستی پیدا نشد",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_NOT_FOUND);
            }
        });

        $exceptions->render(function (MethodNotAllowedHttpException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "متد ارسال شده صحیح نمی باشد",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_METHOD_NOT_ALLOWED);
            }
        });

        $exceptions->render(function (UnauthorizedException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "شما به این بخش دسترسی ندارید",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
        });

        $exceptions->render(function (\Spatie\Permission\Exceptions\UnauthorizedException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "شما به این بخش دسترسی ندارید",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
        });

        $exceptions->render(function (AuthenticationException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "توکن اشتباه می باشد",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
        });

        $exceptions->render(function (AccessDeniedHttpException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "شما به این بخش دسترسی ندارید",
                    'data' => []
                ],\Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
        });

        $exceptions->render(function (ErrorException $exception , Request $request) {
            if($request->is('api/*')){
                return response()->json([
                    'result' => false,
                    'message' => "خطا سرور",
                    'data' => []
                ],500);
            }
        });

        $exceptions->respond(function (Response $response) {
            if($response->getStatusCode() === 500 && $response->headers->get('Content-Type')==='application/json'){

                    return response()->json([
                        'result' => false,
                        'message' => "خطای سمت سرور",
                        'data' => []
                    ],500);
            }

            return  $response;
        });
    })->create();
