<?php

namespace App\Services\Empresa\Features;

use App\Domains\Empresa\Jobs\CadastroEmpresaValidacaoJob;
use App\Domains\Empresa\Jobs\SalvarEmpresaJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class SalvarEmpresaFeature extends Feature
{
    public function handle(Request $request)
    {
        $this->run(CadastroEmpresaValidacaoJob::class, ['input' => $request->input()]);
        
        $empresa = $this->run(SalvarEmpresaJob::class,[
            'nome' => $request->input('nome'),
            'endereco' => $request->input('endereco'),
            'contato' => $request->input('contato'),
        ]);

        return $this->run(new RespondWithJsonJob($empresa, 201));
    }
}
