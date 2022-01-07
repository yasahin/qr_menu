<?php

namespace App\Http\Requests\Admin\Logs;

use Illuminate\Foundation\Http\FormRequest;

class DeleteWithTagsRequest extends FormRequest
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
            'tags' => 'required',
        ];
    }

    public function messages(){
        return [

            'tags.required' => 'En az 1 etiket seçmelisiniz !',

        ];
    }
}
