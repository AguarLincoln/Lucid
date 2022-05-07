<?php

use App\Models\Acao;
use App\Models\Perfil;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acao_perfils', function (Blueprint $table) {
            if (!Schema::hasTable('acao_perfils')) {
                $table->id();
                $table->foreignIdFor(Acao::class);
                $table->foreignIdFor(Perfil::class);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acao_perfils');
    }
};
