<?php

namespace App\Http\Requests\Admin\Auths;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'auths' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Yetki adı boş geçilemez !',
            'auths.required' => 'En az 1 adet yetki seçmelisiniz !',
            'ad.max' => 'Yetki adı max 255 karakter olabilir!',
        ];
    }
}
