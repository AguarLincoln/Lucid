<?php

namespace App\Http\Controllers;



use App\Services\Empresa\Features\ApagarEmpresaFeature;
use App\Services\Empresa\Features\AtualizarEmpresaFeature;
use App\Services\Empresa\Features\ListarEmpresasFeature;
use App\Services\Empresa\Features\MostrarEmpresaFeature;
use App\Services\Empresa\Features\SalvarEmpresaFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class EmpresaController extends Controller
{
    public function cadastrar()
    {
        return $this->serve(SalvarEmpresaFeature::class);
    }

    public function listar(){   
        return $this->serve(ListarEmpresasFeature::class);
    }

    public function buscar($id){   
        return $this->serve(MostrarEmpresaFeature::class, ['id' => $id]);
    }

    public function atualizar($id){   
        return $this->serve(AtualizarEmpresaFeature::class, ['id' => $id]);
    }

    public function apagar($id){   
        return $this->serve(ApagarEmpresaFeature::class, ['id' => $id]);
    }
        
    
}
