<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CardHolder;
use App\Http\Requests\StoreCardHolderRequest;
use App\Http\Requests\UpdateCardHolderRequest;
use Spatie\QueryBuilder\QueryBuilder;

class CardHolderController extends Controller
{
    public function index()
    {
        $cardHolders = QueryBuilder::for(CardHolder::class)
            ->allowedSorts(['first_name', 'last_name', 'created_at'])
            ->allowedFilters(['first_name', 'last_name', 'nationality'])
            ->paginate();

        return $cardHolders;
    }

    public function store(StoreCardHolderRequest $request)
    {
        $cardHolder = CardHolder::create($request->validated());
        return response()->json($cardHolder, 201);
    }

    public function show(CardHolder $cardHolder)
    {
        return $cardHolder->load('creditCards');
    }

    public function update(UpdateCardHolderRequest $request, CardHolder $cardHolder)
    {
        $cardHolder->update($request->validated());
        return $cardHolder;
    }

    public function destroy(CardHolder $cardHolder)
    {
        $cardHolder->delete();
        return response()->noContent();
    }
}
