<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'profil_resmi' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'ad' => 'required|max:255',
            'soyad' => 'required|max:255',
            'telefon' => 'required|min:10|max:11|unique:admin_users',
            'dogum_tarihi' => 'nullable|max:100',
            'adres' => 'nullable',
            'eposta' => 'required|email|max:200|unique:admin_users',
            'sifre' => 'required|confirmed',
            'sifre_confirmation' => 'required',
            'auth' => 'required',
        ];
    }

    public function messages(){
        return [
            'profil_resmi.image' => 'Profil resmi sadece resim dosyası olabilir !',
            'profil_resmi.mimes' => 'Profil resmi jpeg,jpg veya png olmalıdır !',
            'profil_resmi.max' => 'Profil resmi max 4MB olabilir !',

            'ad.required' => 'Adı boş bırakamazsınız !',
            'ad.max' => 'Adınız max 255 karakter olabilir!',

            'soyad.required' => 'Soyadı boş bırakamazsınız !',
            'soyad.max' => 'Soyadınız max 255 karakter olabilir!',

            'telefon.required' => 'Telefon numarasını boş bırakamazsınız !',
            'telefon.max' => 'Telefon numarası max 11 karakter olabilir !',
            'telefon.min' => 'Telefon numarası min 11 karakter olabilir !',
            'telefon.unique' => 'Böyle bir telefon numarası zaten var !',

            'dogum_tarihi.max' => 'Doğum tarihi max 100 karakter olabilir !',

            'eposta.required' => 'E-Posta adresinizi boş bırakamazsınız !',
            'eposta.email' => 'Geçersiz e-posta adresi !',
            'eposta.max' => 'E-Posta adresiniz max 200 karakter olabilir !',
            'eposta.unique' => 'Bu E-Posta adresi zaten kullanılıyor !',

            'sifre.required' => 'Şifrenizi boş bırakamazsınız !',
            'sifre.confirmed' => 'Şifreler eşleşmiyor !',
            'sifre_confirmation.required' => 'Şifre Tekrarını boş bırakamazsınız !',

            'auth.required' => 'Bir yetki seçmek zorundasınız !',

        ];
    }
}
