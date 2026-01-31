<?php

namespace App;

use Symfony\Component\HttpFoundation\JsonResponse;

trait PlanetResponse
{
    protected function planetResponse($data, $message = null, $status_code = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status_code' => $status_code
        ], $status_code);
    }
}
