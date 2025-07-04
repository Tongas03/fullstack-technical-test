<?php

namespace App\Services;

use App\Models\Card;
use App\Models\Payment;
use App\DTO\TicketDTO;
use App\Exceptions\PaymentException;

class Posnet
{
    public function doPayment(Card $card, float $amount, int $installments): TicketDTO
    {
        // Validar cuotas
        if ($installments < 1 || $installments > 6) {
            throw new PaymentException('Invalid number of installments.');
        }

        // Calcular recargo
        $surchargeRate = $installments > 1 ? ($installments - 1) * 0.03 : 0;
        $surchargeAmount = $amount * $surchargeRate;
        $total = $amount + $surchargeAmount;

        // Verificar límite disponible
        if ($card->limit < $total) {
            throw new PaymentException('Insufficient limit.');
        }

        // Descontar del límite
        $card->limit -= $total;
        $card->save();

        // Registrar el pago
        $payment = Payment::create([
            'card_id' => $card->id,
            'amount' => $amount,
            'installments' => $installments,
            'surcharge' => $surchargeRate * 100, // guardamos como porcentaje
            'total' => $total,
            'installment_amount' => round($total / $installments, 2),
        ]);

        // Devolver el ticket
        return new TicketDTO(
            $card->first_name . ' ' . $card->last_name,
            $total,
            round($total / $installments, 2)
        );
    }
}
