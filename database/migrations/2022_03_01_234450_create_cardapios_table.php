<?php

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
        Schema::create('cardapios', function (Blueprint $table) {
            if (!Schema::hasTable('cardapios')) {
                $table->id();
                
                $table->foreignId('produto_id')->constrained('produtos')->cascadeOnDelete();
                $table->foreignId('empresa_id')->constrained('empresas')->cascadeOnDelete();
                $table->string('hash');
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
        Schema::dropIfExists('cardapios');
    }
};
