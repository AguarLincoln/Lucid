<?php

namespace Tests\Feature\Services\Empresa;

use App\Models\Empresa;
use Tests\TestCase;
use App\Services\Empresa\Features\MostrarEmpresaFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MostrarEmpresaFeatureTest extends TestCase
{
    use RefreshDatabase;
    public function test_mostrar_empresa_feature()
    {
        $empresa = [
            'nome' => 'Empresa de teste',
            'endereco' => 'Rua de teste número 0',
            'contato' => '{"telefone": "0000000000"}'
        ];

        $this->post("/api/empresa", $empresa)
                            ->assertStatus(201);
        
        $empresa = Empresa::first();

        $response = $this->get("api/empresa/$empresa->id");
        $this->assertEquals($empresa->id, $response['data']['id']);
        $this->assertEquals($empresa->nome, $response['data']['nome']);
        $this->assertEquals($empresa->endereco, $response['data']['endereco']);
    }
}
