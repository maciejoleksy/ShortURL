<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'link'      => 'required',
            'shortName' => 'unique:links,short_name',
        ];
    }

    public function messages()
    {
        return [
            'link.required'    => 'Link is required',
            'shortName.unique' => 'Short name is already in use',
        ];
    }
}
