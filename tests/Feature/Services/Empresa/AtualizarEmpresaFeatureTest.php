<?php

namespace Tests\Feature\Services\Empresa;

use App\Models\Empresa;
use Tests\TestCase;
use App\Services\Empresa\Features\AtualizarEmpresaFeature;

class AtualizarEmpresaFeatureTest extends TestCase
{
    public function test_atualizar_empresa_feature()
    {
        $empresa = [
            'nome' => 'Empresa de teste',
            'endereco' => 'Rua de teste número 0',
            'contato' => '{"telefone": "0000000000"}'
        ];

        $this->post("/api/empresa", $empresa)
                            ->assertStatus(201);
        
        $atualizar = [
            'nome' => 'Empresa de teste atualizada',
            'endereco' => 'Rua de teste número 1',
            'contato' => '{"telefone": "999999999"}'
        ];

        $empresa = Empresa::first();

        $this->put("/api/empresa/".$empresa->id, $atualizar)
                            ->assertStatus(200);
        
        $empresa = Empresa::first();
        
        $this->assertEquals($atualizar['nome'], $empresa->nome);
        $this->assertEquals($atualizar['endereco'], $empresa->endereco);
        
    }
}
