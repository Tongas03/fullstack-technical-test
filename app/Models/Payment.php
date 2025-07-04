<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'card_id', 'amount', 'installments',
        'surcharge', 'total', 'installment_amount'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
