<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('animal')->unsigned()->nullable(); //Chave estrangeira
            // Nome do campo da tabela (nome da FK)
            //references = nome da coluna da tabela referenciando
            //on = nome da tabela que esta
            //plural 
            $table->foreign('animal')->references('id')->on('animal');
            $table->string('nomeV', 100);
            $table->string('detAtendimento', 255);
            $table->date('dataA');//date
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
        Schema::dropIfExists('atendimento');
    }
}
