<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentRequest extends FormRequest
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
            'student_name' => 'bail|required',
            'student_lastname' => 'bail|required',
            'birthDate' => 'bail|required|date',
            'comments' => 'nullable|string',
        ];
    }
}
