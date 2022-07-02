<?php

namespace App\Repository;


class DataWrapper
{

    public const CODE_SUCCESS_REQUEST = 200;
    public const CODE_BAD_REQUEST = 400;
    public const CODE_UNAUTHORIZED = 401;
    public const CODE_FORBIDDEN = 403;
    public const CODE_NOT_FOUND = 404;
    public const CODE_METHOD_NOT_ALLOWED = 405;
    public const CODE_INTERNAL_SERVER_ERROR = 500;
    public const CODE_BAD_GATEWAY = 502;

    public static function createJsonResponse($data, $status = 200, $error = false) : array
    {
        return array(
          "data" => $data,
          "status" => $status,
          "error" => $error
        );
    }

}