<?php

declare(strict_types=1);

namespace App\Exceptions;

use Throwable;
use Sentry\Laravel\Integration;
use Illuminate\Foundation\Exceptions;

final class Handler extends Exceptions\Handler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(static function (Throwable $e): void {
            Integration::captureUnhandledException($e);
        });
    }
}
