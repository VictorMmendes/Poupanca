<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaqueModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saque_models', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor');
            $table->integer('id_pessoa_models')->unsigned();
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
        Schema::dropIfExists('saque_models');
    }
}
