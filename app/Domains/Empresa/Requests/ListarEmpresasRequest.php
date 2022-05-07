<?php

namespace App\Domains\Empresa\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListarEmpresasRequest extends FormRequest
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
            'por_pagian' => 'nullable|min:1|max:100'
        ];
    }
}
