<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionRequest extends FormRequest
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
            'submission_info_location'    => 'required',
            'submission_info_school'      => 'required',
            'submission_info_specialized' => 'required',
            'submission_info_type'        => 'required',
            // 'submission_info_picture'     => '',
            'school_day'                  => 'required',
            'school_end_day'              => 'required',
        ];
    }
    public function messages()
    {
        return [
            'submission_info_location.required'    => 'Vui lòng nhập tên bằng cấp/chứng chỉ.',
            'submission_info_school.required'      => 'Vui lòng nhập trường/đơn vị đào tạo.',
            'submission_info_specialized.required' => 'Vui lòng nhập chuyên ngành.',
            'submission_info_type.required'        => 'Vui lòng nhập loại tốt nghiệp.',
            // 'submission_info_picture'           => '',
            'school_day.required'                  => 'Vui lòng chọn thời gian.',
            'school_end_day.required'              => 'Vui lòng chọn thời gian.',
        ];
    }
}
