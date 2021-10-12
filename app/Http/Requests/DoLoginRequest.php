<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoLoginRequest extends FormRequest
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
            'captcha'=>'required|captcha'
        ];
    }
    public function messages()
    {
        return [
            'captcha.captcha'=>'验证码不正确',
            'captcha.required'=>'验证码不能为空'
        ];
    }
}
