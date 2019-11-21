<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBrandPost extends FormRequest
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
                'brand_name' => [
                    'required',
                    Rule::unique('brand')->ignore(request()->id,'brand_id'),
                    ],
                'brand_url' => [
                    'required',
                    Rule::unique('brand')->ignore(request()->id,'brand_id'),
                    ] ,

            ];






    }
    public function messages(){
        return [
                'brand_name.required' => '品牌名称不能为空',
                'brand_name.unique' => '品牌名称已存在',
                'brand_url.required' => '品牌网址不能为空',
                'brand_url.unique' => '品牌网址已存在',
        ];
    }

}
