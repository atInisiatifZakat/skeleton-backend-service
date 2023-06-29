<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;

final class HealthCheckController extends Controller
{
    public function index(): JsonResource
    {
        return new JsonResource([
            'status' => true,
            'name' => 'Outflows Rest API @ Inisiatif Zakat Indonesia',
            'date' => now()->toAtomString(),
        ]);
    }
}
