<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name'=>'required',
            'phone'=>'required',
            'deg'=>'required',
            'score'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'姓名不能为空',
            'phone.required'=>'手机号码不能为空',
            'deg.required'=>'学院不能为空',
            'score.required'=>'入学成绩不能为空',
        ];
    }
}
