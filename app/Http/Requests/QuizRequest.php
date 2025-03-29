<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'answers' => 'required|array',
            'answers.*'=> 'required|exists:choices,id',
        ];
    }

    public function messages(): array
    {
        return [
            'answers.required' => 'يجب عليك الإجابة على جميع الأسئلة.',
            'answers.*.required' => 'يجب عليك اختيار إجابة لكل سؤال.',
            'answers.*.exists' => 'إجابة غير صالحة.'
        ];
    }
}