<?php

namespace App\Exceptions;

use Exception;

class getUserException extends Exception
{
    public function render(){
        return response()->json([
            'result' => false,
            'message' => "دیتای درخواستی پیدا نشد 3",
            'data' => []
        ],\Illuminate\Http\Response::HTTP_NOT_FOUND);
    }
}
