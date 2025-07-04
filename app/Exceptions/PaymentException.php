<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class PaymentException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'error' => 'Payment Error',
            'message' => $this->getMessage(),
        ], 422);
    }
}
