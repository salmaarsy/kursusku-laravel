<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    $course = $this->route('course');

    return [
        'code' => [
            'required',
            'string',
            'max:20',
            Rule::unique('courses', 'code')->ignore($course),
        ],
        'name' => ['required', 'string', 'min:3', 'max:120'],
        'description' => ['nullable', 'string', 'max:2000'],
        'fee' => ['required', 'integer', 'min:0'],
        'quota' => ['required', 'integer', 'between:1,500'],
        'start_date' => ['required', 'date'],
        'status' => ['required', 'in:draft,open,closed'],
    ];
}
}
