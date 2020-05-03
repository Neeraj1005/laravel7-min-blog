<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => 'required|max:50',
            // 'email' => 'required|unique:users,email',
            'email' => 'required',
            'role_id' => 'required|not_in:0',
            'is_active' => 'required|not_in:2',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.max' =>'Name string is exceeded',
            'email.required'  => 'A valid email is required',
            'role_id.not_in' => 'Please choose from the list...',
            'is_active.not_in' => 'Please choose from the list...'
        ];
    }
}
