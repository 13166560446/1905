<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdminPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 第二种方法
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
        // echo request()->id;die;
        return
            [
                'admin_name' => [
                    'required',
                    Rule::unique('admin')->ignore(request()->id,'admin_id'),
                    ],
                'admin_email' => [
                    'required',
                    Rule::unique('admin')->ignore(request()->id,'admin_id'),
                    ] ,

            ];
    }
    public function messages(){
        return [
                'admin_name.required' => '管理员账号不能为空',
                'admin_name.unique' => '管理员账号已存在',
                'admin_email.required' => '管理员邮箱不能为空',
                'admin_email.unique' => '管理员邮箱已存在',
        ];
    }

}
