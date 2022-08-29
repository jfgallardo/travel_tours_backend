<?php

namespace App\Exceptions;

use Exception;

class InvalidIataException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => 'Wrong iata name'
        ], 400);
    }
}
