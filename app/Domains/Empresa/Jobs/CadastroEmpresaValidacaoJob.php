<?php

namespace App\Domains\Empresa\Jobs;

use App\Domains\Empresa\Requests\SalvarEmpresa;
use Illuminate\Http\Request;
use Lucid\Units\Job;

class CadastroEmpresaValidacaoJob extends Job
{

    public function __construct(
        private array $input
    ){}

    /**
     * @param  SalvarEmpresa $request
     *
     * @throws InvalidInputException
     */
    public function handle(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:1|max:100',
            'endereco' => 'required|string|min:1|max:255',
            'contato' => 'required|json'
        ]);
    }
}
