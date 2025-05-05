<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class MainController
{
    /**
     * Global success response template
     * @param $data
     * @param int $code
     * @param null $message
     * @return JsonResponse
     */
    public function successResponse($data, int $code = 200, $message=null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status'=>'success',
            'message'=>$message,
            'data'=>$data
        ],$code);
    }

    /**
     * Global error response template
     * @param $message
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse($message = null, int $code = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status'=>'error',
            'message'=>$message,
            'data'=>null
        ], $code);
    }

}
