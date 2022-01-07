<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'sifre' => 'required|confirmed',
            'sifre_confirmation' => 'required',
        ];
    }

    public function messages(){
        return [

            'sifre.required' => 'Şifrenizi boş bırakamazsınız !',
            'sifre.confirmed' => 'Şifreler eşleşmiyor !',
            'sifre_confirmation.required' => 'Şifre Tekrarını boş bırakamazsınız !',

        ];
    }
}
