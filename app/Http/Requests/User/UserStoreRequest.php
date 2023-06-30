<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'required|unique:users',
            'telefone' => ['required', 'string'],
            'data_nascimento' => ['required'],
            'endereco' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'slug' => 'required|unique:users',
            'tipo_cliente' => 'required',
        ];
    }
}
