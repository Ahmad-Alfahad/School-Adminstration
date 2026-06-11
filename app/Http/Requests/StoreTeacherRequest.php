<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'email', 'unique:teachers,email' , 'max:150'],

            'phone' => ['nullable', 'string', 'max:20'],

            'specialization' => ['nullable', 'string', 'max:100'],

            'classroom_id' => ['required', 'exists:classrooms,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Teacher name is required.',
            'name.string' => 'Teacher name must be valid text.',
            'name.max' => 'Teacher name may not exceed 255 characters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already in use.',
            'email.max' => 'Email address may not exceed 150 characters.',

            'phone.string' => 'Phone number must be valid text.',
            'phone.max' => 'Phone number may not exceed 20 characters.',

            'specialization.string' => 'Specialization must be valid text.',
            'specialization.max' => 'Specialization may not exceed 100 characters.',

            'classroom_id.required' => 'Please select a classroom.',
            'classroom_id.exists' => 'The selected classroom does not exist.',
        ];
    }
}
