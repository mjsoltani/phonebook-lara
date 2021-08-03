<?php

namespace App\Exceptions;


use Exception;

class ParamNotFoundException extends Exception
{
    public function report(){}

    public function render()
    {
        return response()->json(
            [
                'errors'=> 'parameter not found '
            ]
        , 404);
    }
}
