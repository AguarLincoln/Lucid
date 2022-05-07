<?php

namespace App\Services\Empresa\Features;

use App\Domains\Empresa\Jobs\BuscarEmpresaJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class MostrarEmpresaFeature extends Feature
{
    public function __construct(private int $id) {}
    public function handle()
    {
        $empresa = $this->run(BuscarEmpresaJob::class, ['id' => $this->id]);
        
        if(!$empresa)
            return $this->run(new RespondWithJsonJob('Empresa não encontrada', 500));    
            
        return $this->run(new RespondWithJsonJob($empresa, 200));    

        
    }
}
