<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Card;
use App\Services\Posnet;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function store(PaymentRequest $request): JsonResponse
    {
        $card = Card::where('number', $request->card_number)->firstOrFail();

        $posnet = new Posnet();
        $ticket = $posnet->doPayment(
            $card,
            $request->amount,
            $request->installments
        );

        return response()->json([
            'message' => 'Payment processed successfully',
            'ticket' => $ticket
        ]);
    }
}