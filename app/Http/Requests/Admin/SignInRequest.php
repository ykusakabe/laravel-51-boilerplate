<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class SignInRequest extends Request
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
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => '',
            'email.email'       => '',
            'password.required' => '',
        ];
    }

}
