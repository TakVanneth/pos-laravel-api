<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'exists:users,id',
                Rule::unique('employee_details')
            ],
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'hire_date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'user_id.unique' => 'The user ID has already been taken.',
        ];
    }
}
