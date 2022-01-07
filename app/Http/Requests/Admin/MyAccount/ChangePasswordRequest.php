<?php

namespace App\Http\Requests\Admin\MyAccount;

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
            'eski_sifre' => 'required',
            'sifre' => 'required|confirmed',
            'sifre_confirmation' => 'required',
        ];
    }

    public function messages(){
        return [
            'eski_sifre.required' => 'Eski şifrenizi boş bırakamazsınız !',
            'sifre.required' => 'Yeni şifrenizi boş bırakamazsınız !',
            'sifre.confirmed' => 'Şifreler eşleşmiyor !',
            'sifre_confirmation.required' => 'Şifre Tekrarını boş bırakamazsınız !',
        ];
    }
}
