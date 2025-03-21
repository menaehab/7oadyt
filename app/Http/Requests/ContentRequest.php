<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:pdf,video,audio',
            'file' => [
                request()->route('content')->hasMedia('uploads') ? 'nullable' : 'required',
                'file',
                'max:50480',
                function ($attribute, $value, $fail) {
                    $type = request()->input('type');
                    $types = [
                        'pdf' => ['pdf'],
                        'video' => ['mp4'],
                        'audio' => ['mp3'],
                    ];
                    if (isset($types[$type])) {
                        if (!in_array($value->getClientOriginalExtension(), $types[$type])) {
                            $fail("يجب أن يكون الملف من النوع الصحيح لنوع المحتوى المحدد ({$type}).");
                        }
                    }
                },
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'questions' => 'nullable|array',
            'questions.*.question' => 'required_with:questions|string|max:255',
            'questions.*.choices' => 'required_with:questions|array|min:2|max:4',
            'questions.*.choices.*.choice' => 'required|string|max:255',
            'questions.*.correct_choice' => 'required_with:questions|integer|min:0|max:3',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا.',

            'category_id.required' => 'حقل التصنيف مطلوب.',
            'category_id.exists' => 'التصنيف المحدد غير موجود.',

            'type.required' => 'حقل النوع مطلوب.',
            'type.in' => 'يجب أن يكون النوع أحد القيم التالية: pdf, video, audio.',

            'file.file' => 'يجب أن يكون الملف صالحًا.',
            'file.mimes' => 'يجب أن يكون الملف من الأنواع: pdf, mp4, mp3.',
            'file.max' => 'يجب ألا يتجاوز حجم الملف 50 ميجابايت.',

            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.mimes' => 'يجب أن تكون الصورة من الأنواع: jpeg, png, jpg, gif.',
            'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت.',

            'description.string' => 'يجب أن يكون الوصف نصًا.',

            'questions.array' => 'يجب أن يكون حقل الأسئلة مصفوفة.',

            'questions.*.question.required_with' => 'يجب إدخال السؤال عند إضافة الأسئلة.',
            'questions.*.question.string' => 'يجب أن يكون السؤال نصًا.',
            'questions.*.question.max' => 'يجب ألا يتجاوز السؤال 255 حرفًا.',

            'questions.*.choices.required_with' => 'يجب إدخال الخيارات عند إضافة الأسئلة.',
            'questions.*.choices.array' => 'يجب أن يكون حقل الخيارات مصفوفة.',
            'questions.*.choices.min' => 'يجب أن تحتوي الخيارات على خيارين على الأقل.',
            'questions.*.choices.max' => 'يجب ألا يزيد عدد الخيارات عن أربعة.',

            'questions.*.choices.*.choice.required' => 'يجب إدخال نص الخيار.',
            'questions.*.choices.*.choice.string' => 'يجب أن يكون الخيار نصًا.',
            'questions.*.choices.*.choice.max' => 'يجب ألا يتجاوز نص الخيار 255 حرفًا.',

            'questions.*.correct_choice.required_with' => 'يجب تحديد الإجابة الصحيحة عند إضافة الأسئلة.',
            'questions.*.correct_choice.integer' => 'يجب أن تكون الإجابة الصحيحة رقمًا صحيحًا.',
            'questions.*.correct_choice.min' => 'يجب أن تكون قيمة الإجابة الصحيحة 0 أو أكثر.',
            'questions.*.correct_choice.max' => 'يجب ألا تتجاوز قيمة الإجابة الصحيحة 3.',
        ];
    }
}