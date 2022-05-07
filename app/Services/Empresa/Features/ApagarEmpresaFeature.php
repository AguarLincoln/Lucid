<?php

namespace App\Services\Empresa\Features;

use App\Domains\Empresa\Jobs\ApagarEmpresaJob;
use App\Domains\Empresa\Jobs\BuscarEmpresaJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class ApagarEmpresaFeature extends Feature
{
    public function __construct(private int $id) {}

    public function handle()
    {
        $empresa = $this->run(BuscarEmpresaJob::class, ['id' => $this->id]);

        if(!$empresa)
            return $this->run(new RespondWithJsonJob('Empresa não encontrada', 500));
        
        
        $retorno = $this->run(ApagarEmpresaJob::class, ['empresa' => $empresa]);
        
        if(!$retorno['sucesso'])
            return $this->run(new RespondWithJsonJob($retorno, 500));
        
        return $this->run(new RespondWithJsonJob('Empresa deletada com sucesso', 200));
    }
}
