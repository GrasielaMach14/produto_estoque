<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('entrada_id');
            $table->bigInteger('saida_id');
 
            $table->foreign('entrada_id')
                        ->references('id')
                        ->on('entradas');
            
            $table->foreign('saida_id')
                        ->references('id')
                        ->on('saidas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoques');
    }
}
