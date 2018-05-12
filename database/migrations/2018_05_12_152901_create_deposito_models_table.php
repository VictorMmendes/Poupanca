<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposito_models', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor');
            $table->integer('id_pessoa_models')->unsigned();
            $table->date('data');
            $table->timestamps();
            $table->foreign('id_pessoa_models')->references('id')->on('pessoa_models')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposito_models');
    }
}
