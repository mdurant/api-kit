<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCreditCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'card_holder_id' => ['sometimes', 'required', 'exists:card_holders,id'],
            'card_number' => ['sometimes', 'required', 'string', 'size:16', 'unique:credit_cards,card_number,' . $this->credit_card?->id],
            'valid_thru' => ['sometimes', 'required', 'string'],
            'cvv' => ['sometimes', 'required', 'string', 'min:3', 'max:4'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
