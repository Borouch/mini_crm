<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
        $companyIds = Company::all()->map(fn($company)=>$company->id);
        return [
            'first_name'=>'required|alpha|min:2',
            'last_name'=>'required|alpha|min:2',
            'company_id'=>'required|'.Rule::in($companyIds),
            'email'=>'nullable|email',
            'phone'=>'nullable|phone',
        ];
    }
}
