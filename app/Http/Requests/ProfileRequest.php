<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu',
            'new_password.required'     => 'Vui lòng nhập mật khẩu',
            'new_password.min'          => 'Mật khẩu phải có 6 ký tự trở lên',
            'new_password.confirmed'    => 'Mật khẩu xác nhận không trùng khớp.',
        ];
    }
}
