<?php

namespace App\Exceptions;

use Exception;

class InvalidDateOutException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => 'Wrong date out',
        ], 400);
    }
}
