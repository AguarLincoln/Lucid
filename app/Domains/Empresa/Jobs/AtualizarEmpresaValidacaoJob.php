<?php

namespace App\Domains\Empresa\Jobs;

use Illuminate\Http\Request;
use Lucid\Units\Job;

class AtualizarEmpresaValidacaoJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:1|max:100',
            'endereco' => 'required|string|min:1|max:255',
            'contato' => 'required|json'
        ]);
    }
}
