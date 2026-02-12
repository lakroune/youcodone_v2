<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaiementRequest extends FormRequest
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
            'reservation_id' => 'required|min:0|numeric|exists:reservations,id',
            'montant' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'reservation_id.required' => 'La reservation est obligatoire.',
            'reservation_id.exists' => 'La reservation n\'existe pas.',
            'montant.required' => 'Le montant est obligatoire.',
            'montant.numeric' => 'Le montant doit etre un nombre.',
        ];
    }
}
