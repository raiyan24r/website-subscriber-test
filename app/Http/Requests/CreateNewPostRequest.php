<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewPostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'required|string',
            'description' => 'required|string',
            'website_id'  => 'required|exists:websites,id',
        ];
    }
}
