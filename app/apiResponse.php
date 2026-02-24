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
        ],$code);

    }
    public function errorResponse($message, $code = 400, $error = null)
    {
        return response()->json([
            'message' => $message,
            'data' => null,
            'code' => $code,
            'error' => $error,
        ],$code);
    }
    public function successResponse($message, $code = 200, $data = null)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'code' => $code,
            'error' => null,
        ],$code);
    }
}
