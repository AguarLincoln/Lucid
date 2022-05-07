<?php

namespace App\Domains\Empresa\Jobs;

use App\Domains\Empresa\Requests\ListarEmpresasRequest;
use Illuminate\Http\Request;
use Lucid\Units\Job;

class ListaEmpresaValidacaoJob extends Job
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
    public function handle(Request $request )
    {   
        $request->validate([
            'por_pagina' => 'nullable|numeric'
        ]);
    }
}
