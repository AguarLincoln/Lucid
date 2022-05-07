<?php

namespace Tests\Feature\Services\Empresa;

use Tests\TestCase;
use App\Features\ListaEmpresasFeature;

class ListaEmpresasFeatureTest extends TestCase
{
    public function test_lista_empresas_feature()
    {
        $response  = $this->get("/api/empresa")
                            ->assertStatus(200);
                        
    }         
}
