<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'service' => 'required|string|max:255',
            'starting_value' => 'required',
            'per_kilometer' => 'required',
            'per_minute' => 'required',
            'description' => 'string',
            // 'is_active' => 'boolean',
        ];
    }
}
