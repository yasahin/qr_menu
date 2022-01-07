<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesCreateRequest extends FormRequest
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
            'name' => 'required|unique:categories',
        ];
    }

    public function messages(){
        return [

            'name.required' => 'Kategori adını boş bırakamazsınız !',
            'name.unique' => 'Böyle bir kategori zaten mevcut !',

        ];
    }
}
