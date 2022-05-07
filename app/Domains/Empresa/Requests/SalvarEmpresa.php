<?php

namespace App\Domains\Empresa\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalvarEmpresa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|min:1|max:100',
            'endereco' => 'required|string|min:1|max:255',
            'contato' => 'required|json'
        ];
    }
}
