<?php

use App\Models\Produto;
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
        Schema::create('produtos', function (Blueprint $table) {
            
            if (!Schema::hasTable('produtos')) {
                
                $table->id();
                
                $table->string('nome', 100);
                $table->integer('quantidade');
                $table->boolean('ativo')->default(false);
                $table->decimal('valor', 6, 2);
                $table->tinyInteger('comissao')->nullable()->default(0);
                $table->decimal('custo', 6, 2)->nullable()->default(0);
                
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
        Schema::dropIfExists('produtos');
    }
};
