<?php

namespace App\Domains\Empresa\Jobs;

use App\Models\Empresa;
use Lucid\Units\Job;

class ListarEmpresasJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
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
        return Empresa::query();
    }
}
