<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreditCardRequest extends FormRequest
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
            'card_holder_id' => ['required', 'exists:card_holders,id'],
            'card_number' => ['required', 'string', 'size:16', 'unique:credit_cards,card_number'],
            'valid_thru' => ['required', 'string'], // MM/YYYY
            'cvv' => ['required', 'string', 'min:3', 'max:4'],
            'is_active' => ['boolean'],
        ];
    }
}
