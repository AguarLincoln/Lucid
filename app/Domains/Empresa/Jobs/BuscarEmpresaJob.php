<?php

namespace App\Domains\Empresa\Jobs;

use App\Models\Empresa;
use Lucid\Units\Job;

class BuscarEmpresaJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private int $id){}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $empresa = Empresa::find($this->id);

        return $empresa;
    }
}
