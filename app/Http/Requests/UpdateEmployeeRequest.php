<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'nik_ktp' => ['required', 'min:16', 'max:16'],
            'nip' => ['required', 'min:6'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'department_id' => ['required'],
            'job_id' => ['required'],
            'gender' => ['required'],
            'religion' => ['required'],
            'date_of_birth' => ['required'],
            'phone_number' => ['required', 'min:11', 'max:13'],
            'address' => ['required'],
        ];
    }
}
