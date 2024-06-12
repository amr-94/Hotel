<?php


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->appendToGroup(
        //     'api',
        //     [
        //         \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        //         'throttle:api',
        //         \Illuminate\Routing\Middleware\SubstituteBindings::class,
        //     ],
        // );
        $middleware->alias([
            // 'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
            // 'sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'employee' => \App\Http\Middleware\EmployeeMiddleware::class,
            'client' => \App\Http\Middleware\ClientMiddleware::class,
            'lastactivity' => \App\Http\Middleware\LastactivityMiddleware::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();