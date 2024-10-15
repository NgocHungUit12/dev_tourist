<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourRequest extends FormRequest
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
            'name' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'location_start' => 'required',
            'vehical' => 'required',
            'hotel' => 'required',
            'description' => 'required',
            'provine_category_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
