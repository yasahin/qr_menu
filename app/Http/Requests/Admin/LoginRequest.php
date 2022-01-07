<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    public function rules(){
        return [
            //
            'eposta' => 'required',
            'sifre' => 'required'
        ];
    }

    public function messages(){
        return [
            'eposta.required' => 'E-Posta adresinizi boş bırakamazsınız !',
            'sifre.required' => 'Şifrenizi boş bırakamazsınız !',
        ];
    }
}
