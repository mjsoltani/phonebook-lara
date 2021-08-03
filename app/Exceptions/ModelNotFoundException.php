<?php

namespace App\Exceptions;


use Exception;

class ModelNotFoundException extends Exception
{
    public function report(){}

    public function render()
    {
        return response()->json(
            [
                'errors'=> 'not Found'
            ]
        , 404);
    }
}
