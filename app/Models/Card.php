<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'type',
        'number',
        'bank_name',
        'limit',
        'dni',
        'first_name',
        'last_name',
    ];
}