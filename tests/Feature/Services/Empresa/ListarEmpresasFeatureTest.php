<?php

namespace Tests\Feature\Services\Empresa;

use Tests\TestCase;
use App\Services\Empresa\Features\ListarEmpresasFeature;

class ListarEmpresasFeatureTest extends TestCase
{
    public function test_listar_empresas_feature()
    {
        $this->get('api/empresa')
            ->assertStatus(200);
    }
}
