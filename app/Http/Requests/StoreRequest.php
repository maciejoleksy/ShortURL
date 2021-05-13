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
            'longUrl'  => 'required',
            'shortUrl' => 'unique:links,short_name',
        ];
    }

    public function messages()
    {
        return [
            'shortUrl.unique'  => 'Short name is already in use',
            'longUrl.required' => 'Link is required',
        ];
    }
}
