<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardHolderRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'nationality' => ['required', 'string', 'max:255'],
            'profession' => ['required', 'string', 'max:255'],
            'declared_income' => ['required', 'numeric', 'min:0'],
            'sex' => ['required', 'string', 'in:Hombre,Mujer'],
            'birth_country' => ['required', 'string', 'max:255'],
        ];
    }
}
