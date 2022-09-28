<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSubscriberRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'       => 'required|string',
            'email'      => 'required|email',
            'website_id' => 'required|exists:websites,id',
        ];
    }
}
