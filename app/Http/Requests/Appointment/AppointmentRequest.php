<?php

namespace App\Http\Requests\Appointment;

use App\Models\User;
use App\Rules\DateRule;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if ($this->employee_id == null)
            return [
                'employee_id' => 'required'
            ];

        return [
            'employee_id' => 'required',
            'user_id' => 'required',
            'comments' => 'required',
            'service_id' => 'required',
            'date' => ['required', 'date', new DateRule()],
            'start_time' => 'required|after_or_equal:' . date('g:ia', strtotime(User::find($this->employee_id)->workingHour->first()->start_time)),
            'finish_time' => 'required|after:start_time|before_or_equal:' . date('g:ia', strtotime(User::find($this->employee_id)->workingHour->first()->finish_time)),
        ];
    }

    public function messages()
    {
        return [
            'finish_time.after' => 'A hora de término não pode ser menor que a hora de início'
        ];
    }
}
