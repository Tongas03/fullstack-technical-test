<?php

namespace App\DTO;

class TicketDTO
{
    public string $customer_name;
    public float $total_amount;
    public float $installment_amount;

    public function __construct(string $customer_name, float $total_amount, float $installment_amount)
    {
        $this->customer_name = $customer_name;
        $this->total_amount = $total_amount;
        $this->installment_amount = $installment_amount;
    }

    public function toArray(): array
    {
        return [
            'customer_name' => $this->customer_name,
            'total_amount' => $this->total_amount,
            'installment_amount' => $this->installment_amount,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this->toArray());
    }
}
