<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAnimal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animal', function (Blueprint $table) {
            $table->integer('tipo')->unsigned()->nullable(); //Chave estrangeira
            // Nome do campo da tabela (nome da FK)
            //references = nome da coluna da tabela referenciando
            //on = nome da tabela que esta
            //plural 
            $table->foreign('tipo')->references('id')->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animal', function (Blueprint $table) {
            //
        });
    }
}
