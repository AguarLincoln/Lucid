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
        Schema::create('itens', function (Blueprint $table) {
            if (!Schema::hasTable('itens')) {
                $table->id();
    
                $table->foreignId('ordem_id')->constrained('ordens')->cascadeOnDelete();
                $table->foreignId('produto_id')->constrained('produtos')->cascadeOnDelete();
                $table->tinyInteger('quantidade');
                $table->tinyInteger('status')->default(0);
                $table->decimal('valor');
                $table->string('observacao')->nullable();
                
                $table->timestamps();
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
        Schema::dropIfExists('itens');
    }
};
