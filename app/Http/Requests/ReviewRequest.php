<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "content_id" => "required|exists:contents,id",
            "comment" => "required",
            "rating" => "required|integer|min:0|max:5",
        ];
    }

    public function messages(): array
    {
        return [
            "content_id.exists" => "معرف المحتوى غير موجود",
            "comment.required" => "التعليق مطلوب",
            "rating.required" => "التصنيف مطلوب",
            "rating.integer" => "يجب أن يكون التصنيف عددًا صحيحًا",
            "rating.min" => "يجب أن يكون التصنيف بين 0 و 5",
            "rating.max" => "يجب أن يكون التصنيف بين 0 و 5",
        ];
    }
}