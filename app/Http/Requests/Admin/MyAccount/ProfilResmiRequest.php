<?php

namespace App\Http\Requests\Admin\MyAccount;

use Illuminate\Foundation\Http\FormRequest;

class ProfilResmiRequest extends FormRequest
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
            'profil_resmi' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ];
    }

    public function messages(){
        return [
            'profil_resmi.required' => 'Bir resim seçmek zorundasınız !',
            'profil_resmi.image' => 'Profil resmi sadece resim dosyası olabilir !',
            'profil_resmi.mimes' => 'Profil resmi jpeg,jpg veya png olmalıdır !',
            'profil_resmi.max' => 'Profil resmi max 4MB olabilir !',
        ];
    }
}
