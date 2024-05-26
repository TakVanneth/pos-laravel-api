<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can define authorization logic here, such as checking if the authenticated user has permission to update users.
        // For now, let's allow anyone to update users.
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
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->id,
            'role_id' => 'required|exists:roles,id',
            'password' => 'sometimes|string|min:8|confirmed', // 'sometimes' means only validate if the field is present
            'old_password' => 'required_with:password|string', // Validation for the old password
        ];
    }
}
