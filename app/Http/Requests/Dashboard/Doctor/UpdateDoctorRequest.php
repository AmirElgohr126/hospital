<?php

namespace App\Http\Requests\Dashboard\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:doctors,email,' . $this->route('id')],
            'phone' => ['required', 'string', 'max:15'],
            'specialization' => ['required', 'string', 'max:255'],
            'biography' => ['nullable', 'string'],
            // image only png or jpg or jpeg
            'profile_picture' => ['nullable', 'file', 'max:4096', 'mimes:jpg,jpeg,png,webp,svg,gif'],
            'appointment_schedule' => ['required', 'string', 'max:255'],

        ];
    }
}
