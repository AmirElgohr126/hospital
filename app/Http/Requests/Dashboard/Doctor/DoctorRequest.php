<?php

namespace App\Http\Requests\Dashboard\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'biography' => 'required|string|min:10',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|digits_between:10,15',
            'section_id' => 'required|exists:sections,id',
            'days' => 'required|array',
            'days.*' => 'required|in:sunday,monday,tuesday,wednesday,thursday,friday,saturday',
            'schedule_from' => 'required|date_format:H:i',
            'schedule_to' => 'required|date_format:H:i|after:schedule_from',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:40960',
            'status' => 'required|in:active,inactive',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('Dashboard/doctors.enter_doctor_name'),
            'biography.required' => __('Dashboard/doctors.enter_doctor_bio'),
            'email.required' => __('Dashboard/doctors.enter_doctor_email'),
            'phone.required' => __('Dashboard/doctors.enter_doctor_phone'),
            'section_id.required' => __('Dashboard/doctors.select_section'),
            'section_id.exists' => __('Dashboard/doctors.enter_doctor_section'),
            'days.required' => __('Dashboard/doctors.enter_doctor_days'),
            'schedule_from.required' => __('Dashboard/doctors.enter_schedule_from'),
            'schedule_to.required' => __('Dashboard/doctors.enter_schedule_to'),
            'image.required' => __('Dashboard/doctors.enter_doctor_image'),
            'status.required' => __('Dashboard/doctors.select_status'),
        ];
    }
}
