<?php

namespace App\Services;

class ResponseService
{

    /**
     * basic response
     *
     * @param int $code
     * @param string $message
     * @param mixed $errors
     * @param mixed $data
     * @return array
     */
    public static function basicResponse($code, $message = "", $errors = null, $data = null): mixed
    {
        if (!is_null($errors)) {
            if (!is_object($errors)) {
                $errors = (object) $errors;
            }
        }
        return
            [
                'message' => $message,
                'errors'  => $errors,
                'data'    => $data,
                'code'    => $code,
            ];
    }

    /**
     * api response
     *
     * @param integer $code
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    public static function apiResponse(int $code, string $message = "", mixed $data = [])
    {
        return response()->json([
            'message' => $message,
            'data'    => $data,
        ], $code);
    }
}
