<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryDestroyResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return !($this->route('category') == config('cms.default_category_id'));
    }

    //retornar mensagem de erro

    public function forbiddenResponse()
    {
        return redirect()->back()->with("error-message", "Você não pode apagar a categoria padrão");
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
