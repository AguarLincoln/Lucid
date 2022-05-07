<?php

namespace App\Domains\Empresa\Jobs;

use App\Models\Empresa;
use Lucid\Units\Job;

class SalvarEmpresaJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $nome,
        private string $endereco,
        private string $contato,

    ){}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $attributes = [
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'contato' => $this->contato
        ];

        return tap(new Empresa($attributes))->save();

    }
}
