<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;

class ResponseError
{
    public static function failedValidation($validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
