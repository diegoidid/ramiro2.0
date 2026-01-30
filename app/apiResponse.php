<?php
namespace App;
    use Symfony\Component\HttpFoundation\JsonResponse;
trait apiResponse
{
    public function apiResponse($data, $message = null, $code = 200, $error = null)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'code' => $code,
            'error' => $error,
        ], $code);

    }
}
