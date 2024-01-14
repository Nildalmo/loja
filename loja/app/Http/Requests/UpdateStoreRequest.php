<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
            'name'           => ['nullable', 'string'],
            'category'       => ['nullable', 'string'],
            'time'           => ['nullable', 'string'],
            'logo'           => ['nullable', 'string'],
            'cover'          => ['nullable', 'string'],
            'minimum_order'  => ['nullable', 'string'],
            'delivery_carge' => ['nullable', 'string'],
        ];

    }
}
