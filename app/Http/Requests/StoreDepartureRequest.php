<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartureRequest extends FormRequest
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
            'tour_id'=> "required",
            'adult' => "required",
            'children_6_11' => "required",
            'children_6' => "required",
            'departure_day' => "required",
            'quantity' => "required",
        ];
    }
}
