<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'card_number' => ['required', 'digits:8', 'exists:cards,number'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'installments' => ['required', 'integer', 'between:1,6'],
        ];
    }
}

