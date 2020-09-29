<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaTarefa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function(Blueprint $table) {
            $table->increments('id');
            $table->dateTime('dia_hora');
            $table->enum('energia_inicio', [0,1,2,3,4])->default(0);
            $table->enum('energia_fim', [0,1,2,3,4])->default(0);
            $table->string('objetivo_meta');
            $table->string('objetivo_habito_bom');
            $table->string('objetivo_habito_ruim');
            $table->string('objetivo_habilidade');
            $table->enum('objetivos_obtidos', [0,1,2,3,4])->default(0);
            $table->dateTime('data_criacao');
            $table->integer('avaliacao_id');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tarefas');
    }
}
