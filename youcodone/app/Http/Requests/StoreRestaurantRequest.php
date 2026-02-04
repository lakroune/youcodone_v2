<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom_restaurant' => ['required', 'string', 'max:255'],
            'adresse_restaurant' => ['required', 'string', 'max:255'],
            'telephone_restaurant' => ['required', 'string', 'max:20'],
            'description_restaurant' => ['nullable', 'string'],
            'email_restaurant' => ['nullable', 'string', 'email', 'max:255'],
            'capacite_restaurant' => ['nullable', 'integer', 'max:50'],
            'type_cuisine_id' => ['required', 'exists:type_cuisines,id'],
        ];
    }
}
