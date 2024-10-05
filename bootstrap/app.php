<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);
        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

      $middleware->validateCsrfTokens(except: [
        'stripe/*',
        'http://example.com/foo/bar',
        'http://example.com/foo/*',
      ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

      $exceptions->render(function(PDOException $e){
        Log::info($e);
        return response()->json(['msg'=>'test'],500);
      });
      $exceptions->render(function (AuthenticationException $e, Request $request) {
          Log::info('$e');
          return response()->json([
              'message' => 'Not authenticated'
            ], 401);
        
        // Handle other exceptions or default response here
        //return $e->render($request);
    });
      $exceptions->render(function (ValidationException $e) {
          //Log::info($e->getMessage());
          return response()->json([
              'message' => 'Not authenticated'
            ], 401);
        
        // Handle other exceptions or default response here
        //return $e->render($request);
    });
    })->create();
