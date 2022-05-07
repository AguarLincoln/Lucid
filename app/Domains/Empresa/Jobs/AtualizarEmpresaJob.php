<?php

namespace App\Domains\Empresa\Jobs;

use App\Models\Empresa;
use Lucid\Units\Job;

class AtualizarEmpresaJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private Empresa $empresa, private string $nome, private string $endereco, private string $contato)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $this->empresa->nome = $this->nome;
            $this->empresa->endereco = $this->endereco;
            $this->empresa->contato = $this->contato;
            $this->empresa->save();

            return [
                'sucesso' => true,
                'data' => $this->empresa
            ];
        }catch(\Exception $ex){
            return [
                'sucesso' => false,
                'msg' => 'Erro ao atualizar empresa.',
                'erro' => $ex->getMessage()
            ];
        }
    }
}
