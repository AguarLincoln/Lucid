<?php

namespace App\Services\Empresa\Features;

use App\Domains\Empresa\Jobs\AtualizarEmpresaJob;
use App\Domains\Empresa\Jobs\AtualizarEmpresaValidacaoJob;
use App\Domains\Empresa\Jobs\BuscarEmpresaJob;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AtualizarEmpresaFeature extends Feature
{
    public function __construct(private int $id){}

    public function handle(Request $request)
    {
        $this->run(AtualizarEmpresaValidacaoJob::class, ['input' => $request->input()]);
        
        $empresa = $this->run(BuscarEmpresaJob::class, ['id' => $this->id]);
        
        if(!$empresa)
            return $this->run(new RespondWithJsonJob('Empresa não encontrada', 400));    

        $atualizado = $this->run(AtualizarEmpresaJob::class,[
            'empresa' => $empresa,
            'nome' => $request->input('nome'),
            'endereco' => $request->input('endereco'),
            'contato' => $request->input('contato'),
        ]);

        if(!$atualizado['sucesso'])
            return $this->run(new RespondWithJsonJob($atualizado, 201));

        return $this->run(new RespondWithJsonJob([
            'sucesso' => $atualizado['sucesso'],
            'msg' => 'Empresa atualizada com sucesso',
            'id' => $atualizado['data']['id']
        ], 200));
    }
}
