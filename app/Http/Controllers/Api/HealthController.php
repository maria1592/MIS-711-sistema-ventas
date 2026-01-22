<?php

namespace App\Http\Controllers\Api;

// Corregido: Importaciones ordenadas alfabéticamente
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class HealthController
{
    public function __invoke(): JsonResponse
    {
        try {
            DB::connection()->getPdo();

            return response()->json([
                'status' => 'ok',
                'database' => 'connected', // Corregido: trailing_comma_in_multiline
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'database' => 'disconnected', // Corregido: trailing_comma_in_multiline
            ], 500);
        }
    }
}
