<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGoodsPost extends FormRequest
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
                'goods_name' => [
                    'required',
                    Rule::unique('goods')->ignore(request()->id,'cate_id'),
                    ],


            ];






    }
    public function messages(){
        return [
                'cate_name.required' => '分类名称不能为空',
                'cate_name.unique' => '分类名称已存在',
        ];
    }

}
