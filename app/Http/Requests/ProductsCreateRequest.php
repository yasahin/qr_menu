<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsCreateRequest extends FormRequest
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
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ];
    }

    public function messages(){
        return [
            'picture.image' => 'Ürün resmi sadece resim dosyası olabilir !',
            'picture.mimes' => 'Ürün resmi jpeg,jpg veya png olmalıdır !',
            'picture.max' => 'Ürün resmi max 4MB olabilir !',

            'category_id.required' => 'Bir kategori seçmelisiniz !',
            'name.required' => 'Ürün adını boş bırakamazsınız !',
            'price.required' => 'Ürün fiyatını boş bırakamazsınız !',

        ];
    }
}
