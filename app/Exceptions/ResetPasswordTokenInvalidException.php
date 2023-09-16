<?php

namespace App\Exceptions;

use Exception;

class ResetPasswordTokenInvalidException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => 'Reset password token not valid.',
        ], 400);
    }
}
