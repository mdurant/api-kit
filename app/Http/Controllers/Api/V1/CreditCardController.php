<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditCard;
use App\Http\Requests\StoreCreditCardRequest;
use App\Http\Requests\UpdateCreditCardRequest;
use Spatie\QueryBuilder\QueryBuilder;

class CreditCardController extends Controller
{
    public function index()
    {
        $creditCards = QueryBuilder::for(CreditCard::class)
            ->allowedSorts(['created_at'])
            ->allowedFilters(['card_holder_id', 'is_active'])
            ->with('cardHolder')
            ->paginate();

        return $creditCards;
    }

    public function store(StoreCreditCardRequest $request)
    {
        $creditCard = CreditCard::create($request->validated());
        return response()->json($creditCard, 201);
    }

    public function show(CreditCard $creditCard)
    {
        return $creditCard->load('cardHolder');
    }

    public function update(UpdateCreditCardRequest $request, CreditCard $creditCard)
    {
        $creditCard->update($request->validated());
        return $creditCard;
    }

    public function destroy(CreditCard $creditCard)
    {
        $creditCard->delete();
        return response()->noContent();
    }
}
