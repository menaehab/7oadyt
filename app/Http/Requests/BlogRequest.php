<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم المدونة مطلوب',
            'content.required'=> 'المقالة مطلوبة',
        ];
    }
}