<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name'=>'required|min:2',
            'logo'=>'nullable|max:4000|dimensions:min_width=100,min_height=100|mimes:png,jpg,jpeg',
            'email'=>'nullable|email',
            'website'=>'nullable|url',
        ];
    }
}
