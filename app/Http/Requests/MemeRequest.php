<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemeRequest extends FormRequest
{
    public function rules():array
    {
        return [
            'title' => 'required|string',
            'image' => 'nullable|image|mimetypes:image/*|max:2048',
            'tags.*' => 'nullable|string',
        ];
    }
}
