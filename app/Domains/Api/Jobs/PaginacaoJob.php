<?php

namespace App\Domains\Api\Jobs;

use Illuminate\Database\Eloquent\Builder;
use Lucid\Units\Job;

class PaginacaoJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private Builder $query, private int $porPagina)
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
        return $this->query->paginate($this->porPagina);
    }
}
