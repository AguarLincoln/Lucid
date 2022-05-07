<?php

namespace App\Domains\Api\Jobs;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Builder;
use Lucid\Units\Job;

class ProcurarNaTabelaJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private Builder $consulta,
        private string $procurar
    ){}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        if ($this->procurar) {
            $colunasPesquisa = (new Empresa)->getFillable();
            
            $this->consulta->where(function ($query) use ($colunasPesquisa) {
                foreach ($colunasPesquisa as $coluna) {
                    $query->orWhere($coluna, 'LIKE', '%' . $this->procurar . '%');
                }
            });
        } 

        return $this->consulta;
    }
}
