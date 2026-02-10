<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'restaurant_id' => 'required|exists:restaurants,id',
            'date_reservation' => 'required|date|after_or_equal:today',
            'heure_reservation' => 'required', //|date_format:H:i
        ];
    }

    public function messages()
    {
        return [
            'date_reservation.after_or_equal' => 'La date de reservation doit etre au moins aujourd\'hui.',
        ];
    }
}
