<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'personal_ID' => 'required|string|max:255',
            'phone' => 'required|string|unique:drivers|max:255',
            'email' => 'required|string|unique:drivers|max:255',
            'gender_id' => 'required',
            'birthday' => 'required|date',
            'nationality_id' => 'required',
            // 'image' => 'required|image|max:4096|mimes:jpg,png,jpeg,svg',
            // 'identification_card_image' => 'required|image|max:4096|mimes:jpg,png,jpeg,svg',
            'service_id' => 'required',
            // 'car_id' => 'required',

            //car validate
            'car_type_id' => 'required',
            'model' => 'required|string|max:255',
            'plate_number' => 'required',
            'color_id' => 'required',
            // 'car_insurance_image' => 'required|image|max:4096|mimes:jpg,png,jpeg,svg',
            // 'car_image_front' => 'required|image|max:4096|mimes:jpg,png,jpeg,svg',
            // 'car_image_back' => 'required|image|max:4096|mimes:jpg,png,jpeg,svg',
            // 'car_image_left' => 'required|image|max:4096|mimes:jpg,png,jpeg,svg',
            // 'car_image_right' => 'required|image|max:4096|mimes:jpg,png,jpeg,svg',
        ];
    }
}
