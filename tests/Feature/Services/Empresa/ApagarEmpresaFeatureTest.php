<?php

namespace Tests\Feature\Services\Empresa;

use App\Models\Empresa;
use Tests\TestCase;
use App\Services\Empresa\Features\ApagarEmpresaFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApagarEmpresaFeatureTest extends TestCase
{
    use RefreshDatabase;
    public function test_apagar_empresa_feature()
    {
        $empresa = [
            'nome' => 'Empresa de teste',
            'endereco' => 'Rua de teste número 0',
            'contato' => '{"telefone": "0000000000"}'
        ];
        $empresa = Empresa::create($empresa);
        
        $response = $this->delete('/api/empresa/'.$empresa->id)
                        ->assertStatus(200);

            $this->assertDatabaseMissing('empresas', ['id' => $empresa->id]);

    }
}
