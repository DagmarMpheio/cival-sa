<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserDestroyResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !($this->route('users') == config('cms.default_user_id') ||
        $this->route('users') == auth()->user()->id);
    }

    //retornar mensagem de erro

    public function forbiddenResponse()
    {
        return redirect()->back()->with("error-message", "Você não pode apagar o usuário padrão ou excluir vc mesmo");
    }

    //retornar o erro
    public function failedAuthorization()
    {
        throw new HttpResponseException($this->forbiddenResponse());
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
        ];
    }
}
