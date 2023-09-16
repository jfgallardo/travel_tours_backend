<?php

namespace App\Exceptions;

use Exception;

class EmailNotVerifiedException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => 'Email not verify.',
        ], 400);
    }
}
