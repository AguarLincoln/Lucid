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
        Schema::create('ordens', function (Blueprint $table) {
            
            if (!Schema::hasTable('ordens')) {
                
                $table->id();
    
                $table->foreignId('mesa_id')->constrained('mesas')->cascadeOnDelete();
                //$table->foreignId('item_id')->constrained('itens')->cascadeOnDelete();
                $table->decimal('valor_total', 10, 2); 
    
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
        Schema::dropIfExists('ordens');
    }
};
