<?php

declare(strict_types=1);

use Inisiatif\Package\User;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheckController;

User\Routes::authToken();
User\Routes::userToken();
User\Routes::userProfile();

Route::prefix('/')->group(function (Router $router): void {
    $router->get('/ping', [HealthCheckController::class, 'index']);

    $router->middleware('auth:sanctum')->group(function (Router $router): void {
    });
});
