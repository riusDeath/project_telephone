<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListImage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'color' => [
                'required',
                Rule::unique('list_images')->ignore(request()->id),
            ],
            
        ];
    }
}
