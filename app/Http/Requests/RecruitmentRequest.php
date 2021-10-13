<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentRequest extends FormRequest
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
            'name'         => 'required',
            'benefit_text' => 'min:100',
            'preview_text' => 'min:100',
            'deadline'     => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Vui lòng nhập Vị trí',
            'deadline.required'     => 'Vui lòng nhập Hạn nộp hồ sơ',
            'preview_text.min'      => 'Tối thiểu 100 ký tự',
            'benefit_text.min'      => 'Tối thiểu 100 ký tự',
        ];
    }
}
