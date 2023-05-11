<?php

namespace App\Http\Requests\FAQS;

use Illuminate\Foundation\Http\FormRequest;

class FAQUpdateRequest extends FormRequest
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
            'questao' => ['required', 'string'],
            'resposta' => ['required', 'string'],
        ];
    }
}
