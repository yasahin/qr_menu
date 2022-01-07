<?php

namespace App\Http\Requests\Admin\Notifications;

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
            'users' => 'required',
            'icon' => 'required|max:255',
            'renk' => 'required|max:255',
            'contents' => 'required',
        ];
    }

    public function messages(){
        return [

            'users.required' => 'En az 1 kullanıcı seçmelisiniz !',
            'icon.required' => 'Bir icon seçmeniz gerekmektedir.',
            'renk.required' => 'Bir renk seçmeniz gerekmektedir.',
            'contents.required' => 'Bildirim içeriği boş geçilemez',

            'icon.max' => 'Icon max 255 karakter olabilir!',
            'renk.max' => 'Renk max 255 karakter olabilir!',

        ];
    }
}
