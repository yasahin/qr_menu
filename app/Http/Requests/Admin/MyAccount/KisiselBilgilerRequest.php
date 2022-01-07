<?php

namespace App\Http\Requests\Admin\MyAccount;

use Illuminate\Foundation\Http\FormRequest;

class KisiselBilgilerRequest extends FormRequest
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
            'ad' => 'required|max:255',
            'soyad' => 'required|max:255',
            'telefon' => 'required|min:10|max:11|unique:admin_users,telefon,'.getCurrentUser()->id,
            'dogum_tarihi' => 'nullable|max:100',
        ];
    }

    public function messages(){
        return [
            'ad.required' => 'Adı boş bırakamazsınız !',
            'ad.max' => 'Adınız max 255 karakter olabilir!',

            'soyad.required' => 'Soyadı boş bırakamazsınız !',
            'soyad.max' => 'Soyadınız max 255 karakter olabilir!',

            'telefon.required' => 'Telefon numarasını boş bırakamazsınız !',
            'telefon.max' => 'Telefon numarası max 11 karakter olabilir !',
            'telefon.min' => 'Telefon numarası min 11 karakter olabilir !',
            'telefon.unique' => 'Böyle bir telefon numarası zaten var !',

            'dogum_tarihi.max' => 'Doğum tarihi max 100 karakter olabilir !',

        ];
    }
}
