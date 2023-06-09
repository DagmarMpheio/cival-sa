<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required',
            'telefone' => 'required',
            'data_nascimento' => 'required',
            'endereco' => 'required',
            'genero'=> 'required',
            'slug' => 'required',
            'tipo_cliente' => 'required',
            //'password' => 'required_with:password_confirmation|string|confirmed|min:8',
        ];
    }
}
