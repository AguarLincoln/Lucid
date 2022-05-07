<?php

namespace App\Services\Empresa\Features;

use App\Domains\Api\Jobs\PaginacaoJob;
use App\Domains\Api\Jobs\ProcurarNaTabelaJob;
use App\Domains\Empresa\Jobs\ListaEmpresaValidacaoJob;
use App\Domains\Empresa\Jobs\ListarEmpresasJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class ListarEmpresasFeature extends Feature
{
    public function handle(Request $request)
    {
        $this->run(ListaEmpresaValidacaoJob::class,['input' => $request->input()]);
        
        $query = $this->run(ListarEmpresasJob::class);
        
        if($request->input('buscar_por')){
            $query = $this->run(ProcurarNaTabelaJob::class, ['consulta' => $query, 'procurar' => $request->input('buscar_por')]);
        }

        $dados = $this->run(PaginacaoJob::class, ['query' => $query, 'porPagina' => $request->input('por_pagina')?? 10]);

        return $this->run(new RespondWithJsonJob($dados, 200)); 
    }
}
