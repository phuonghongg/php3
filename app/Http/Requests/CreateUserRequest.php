<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            //
            'name' => ['required', 'min:5', 'max:15'],
            'email' => 'required|unique:users|email|ends_with:@gmail.com',
            'password' => 'required|min:8',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.min'   => 'Tên quá ngắn',
            'name.max' => 'Tên quá dài',
            'email.required' => 'Email là bắt buộc!',
            'email.unique' => 'Email này đã được sử dụng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải hơn 8 kí tự'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên người dùng',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ];
    }
}
