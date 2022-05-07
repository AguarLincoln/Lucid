<?php

namespace App\Domains\Empresa\Jobs;

use App\Models\Empresa;
use Lucid\Units\Job;

class ApagarEmpresaJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private Empresa $empresa){}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{

            return [
                'sucesso' => $this->empresa->delete()
            ];

        }catch(\Exception $ex){
            return [
                'sucesso' => false,
                'msg' => 'Erro ao deletar',
                'erro' => $ex->getMessage()
            ];
        }
    }
}
