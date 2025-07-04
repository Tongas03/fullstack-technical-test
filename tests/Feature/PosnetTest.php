<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Card;
use App\Services\Posnet;
use App\Exceptions\PaymentException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PosnetTest extends TestCase
{
    use RefreshDatabase;

    public function test_successful_payment()
    {
        $card = Card::create([
            'type' => 'VISA',
            'number' => '12345678',
            'bank_name' => 'Banco Nación',
            'limit' => 20000,
            'dni' => '30123456',
            'first_name' => 'Juan',
            'last_name' => 'Pérez',
        ]);

        $posnet = new Posnet();
        $ticket = $posnet->doPayment($card, 10000, 3);

        $this->assertEquals('Juan Pérez', $ticket->customer_name);
        $this->assertEquals(10600, $ticket->total_amount);
        $this->assertEquals(3533.33, round($ticket->installment_amount, 2));
    }

    public function test_payment_fails_with_insufficient_limit()
    {
        $card = Card::create([
            'type' => 'AMEX',
            'number' => '87654321',
            'bank_name' => 'Banco Provincia',
            'limit' => 1000,
            'dni' => '40111222',
            'first_name' => 'Lucía',
            'last_name' => 'Gómez',
        ]);

        $posnet = new Posnet();

        $this->expectException(PaymentException::class);
        $this->expectExceptionMessage('Insufficient limit.');

        $posnet->doPayment($card, 2000, 4); // requiere 9% más, excede el límite
    }
}

