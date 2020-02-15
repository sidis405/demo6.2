<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:7|max:22',
            'category_id' => 'required|exists:categories,id',
            'preview' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.exists' => 'You funky lil monkey'
        ];
    }
}
