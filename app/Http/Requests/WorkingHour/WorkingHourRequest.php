<?php

namespace App\Http\Requests\WorkingHour;

use Illuminate\Foundation\Http\FormRequest;

class WorkingHourRequest extends FormRequest
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
        return [
            'employee_id' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'finish_time' => 'required|after:start_time'
        ];
    }

    public function messages()
    {
        return [
            'finish_time.after' => 'A hora de término não pode ser menor que a hora de início'
        ];
    }
}
