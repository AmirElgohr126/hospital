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
            'name' => 'required|string|min:3',
            'biography' => 'required|string|min:10',
            'email' => 'required|email|unique:doctors,email,' . $this->route('id'),
            'phone' => 'required|digits_between:10,15',
            'section_id' => 'required|exists:sections,id',
            'days' => 'required|array',
            'days.*' => 'required|in:sunday,monday,tuesday,wednesday,thursday,friday,saturday',
            'schedule_from' => 'required|date_format:H:i:s',
            'schedule_to' => 'required|date_format:H:i:s|after:schedule_from',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:40960',
            'status' => 'required|in:active,inactive',
        ];
    }


    /**
     * Get the custom messages for the validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => __('Dashboard/doctors.enter_doctor_name'),
            'name.string' => __('Dashboard/doctors.enter_doctor_name'),
            'name.min' => __('Dashboard/doctors.enter_doctor_name'),
            'biography.required' => __('Dashboard/doctors.enter_doctor_bio'),
            'biography.string' => __('Dashboard/doctors.enter_doctor_bio'),
            'email.required' => __('Dashboard/doctors.enter_doctor_email'),
            'email.email' => __('Dashboard/doctors.enter_doctor_email'),
            'email.unique' => __('Dashboard/doctors.doctor_email_already_exists'),
            'phone.required' => __('Dashboard/doctors.enter_doctor_phone'),
            'phone.digits_between' => __('Dashboard/doctors.enter_doctor_phone'),
            'section_id.required' => __('Dashboard/doctors.enter_doctor_section'),
            'section_id.exists' => __('Dashboard/doctors.section_not_found'),
            'days.required' => __('Dashboard/doctors.enter_doctor_days'),
            'days.array' => __('Dashboard/doctors.enter_doctor_days'),
            'days.*.in' => __('Dashboard/doctors.enter_doctor_days'),
            'schedule_from.required' => __('Dashboard/doctors.enter_schedule_from'),
            'schedule_from.date_format' => __('Dashboard/doctors.enter_schedule_from'),
            'schedule_to.required' => __('Dashboard/doctors.enter_schedule_to'),
            'schedule_to.date_format' => __('Dashboard/doctors.enter_schedule_to'),
            'schedule_to.after' => __('Dashboard/doctors.schedule_to_after_schedule_from'),
            'image.image' => __('Dashboard/doctors.enter_doctor_image'),
            'image.mimes' => __('Dashboard/doctors.enter_doctor_image'),
            'image.max' => __('Dashboard/doctors.enter_doctor_image'),
            'status.required' => __('Dashboard/doctors.select_status'),
            'status.in' => __('Dashboard/doctors.select_status'),
        ];
    }
}
