<?php

namespace App\Http\Requests;
use illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
            'title' => ['string', 'max:255'],
            'description'=> ['string'],
            'status'=> ['string'],
            'attachment'=> ['sometimes', 'file', 'mimes:jpg,jpeg,png,pdf'],
        ];
    }
}
