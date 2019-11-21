<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTextPost extends FormRequest
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
                'title' => [
                    'required',
                    'alpha_dash',
                    Rule::unique('text')->ignore(request()->id,'id'),
                    ],
                // 'email' => [
                //     'required',
                //     Rule::unique('text')->ignore(request()->id,'id'),
                //     ],
                'zhongyao' => 'required',
                'zhanshi' => 'required',
                'cate_id' => 'required'

            ];
    }
    public function messages(){
        return [
                'title.required' => '标题不能为空',
                'title.alpha_dash' => '标题可以包含字母和数字，以及破折号和下划线',
                'title.unique' => '标题已存在',
                // 'email.required' => '邮箱不能为空',
                // 'email.unique' => '邮箱已存在',
                'zhanshi.required' => '显示不能为空',
                'zhongyao.required' => '重要性不能为空',
                'cate_id.required' => '分类不能为空',
        ];
    }

}
