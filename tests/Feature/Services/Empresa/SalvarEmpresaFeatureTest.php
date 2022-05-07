<?php

namespace Tests\Feature\Services\Empresa;

use Tests\TestCase;
use App\Features\SalvarEmpresaFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalvarEmpresaFeatureTest extends TestCase
{
    use RefreshDatabase;
    public function test_salvar_empresa_feature()
    {
        
        $empresa = [
            'nome' => 'Empresa de teste',
            'endereco' => 'Rua de teste número 0',
            'contato' => '{"telefone": "0000000000"}'
        ];

        $response = $this->post("/api/empresa", $empresa)
                            ->assertStatus(201);
        
    }

}
