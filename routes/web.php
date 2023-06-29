<?php

declare(strict_types=1);

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function (Router $router): void {
    $router->redirect('/', '/api/ping');
});
