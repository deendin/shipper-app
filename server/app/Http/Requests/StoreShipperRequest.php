<?php

namespace App\Http\Requests;

use App\Http\Resources\ValidationResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreShipperRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' => 'required|string|max:255',
            'address' => 'required',
            'contact' => 'required|array',
            'contact.name' => 'required|string',
            'contact.contact_number' => 'required|string|min:10',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new ValidationResource($validator->errors());

        throw new ValidationException($validator, $response);
    }
}
