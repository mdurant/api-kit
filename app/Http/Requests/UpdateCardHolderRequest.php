<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCardHolderRequest extends FormRequest
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
            'first_name' => ['sometimes', 'required', 'string', 'max:255'],
            'last_name' => ['sometimes', 'required', 'string', 'max:255'],
            'birth_date' => ['sometimes', 'required', 'date'],
            'nationality' => ['sometimes', 'required', 'string', 'max:255'],
            'profession' => ['sometimes', 'required', 'string', 'max:255'],
            'declared_income' => ['sometimes', 'required', 'numeric', 'min:0'],
            'sex' => ['sometimes', 'required', 'string', 'in:Hombre,Mujer'],
            'birth_country' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }
}
