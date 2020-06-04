<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('produto_id');
            $table->bigInteger('fornecedor_id');
            $table->bigInteger('funcionario_id');
            $table->integer('quantidade');
            $table->date('data_entrada');

            $table->foreign('produto_id')
                    ->references('id')
                    ->on('produtos');
            
            $table->foreign('fornecedor_id')
                        ->references('id')
                        ->on('fornecedors');
            
            $table->foreign('funcionario_id')
                        ->references('id')
                        ->on('funcionarios');

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
        Schema::dropIfExists('entradas');
    }
}
