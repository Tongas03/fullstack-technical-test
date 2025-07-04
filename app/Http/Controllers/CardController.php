<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCardRequest;
use App\Models\Card;
use Illuminate\Http\JsonResponse;

class CardController extends Controller
{
    public function store(StoreCardRequest $request): JsonResponse
    {
        $card = Card::create($request->validated());

        return response()->json([
            'message' => 'Card registered successfully',
            'data' => $card,
        ], 201);
    }
}
