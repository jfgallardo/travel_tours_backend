<?php

namespace App\Exceptions;

use Exception;

class EmptyFieldException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => 'Field empty!'
        ], 400);
    }
}
