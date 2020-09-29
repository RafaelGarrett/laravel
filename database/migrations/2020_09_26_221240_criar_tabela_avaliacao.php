<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('nota_inicio');
            $table->integer('nota_fim')->nullable();
            $table->string('meta');
            $table->string('habito_bom');
            $table->string('habito_ruim');
            $table->string('habilidade');
            $table->enum('status', ['ativo', 'finalizado', 'aberto'])->default('aberto');
            $table->enum('area', [
                'Espiritual e Valores',
                'Corpo e Mente',
                'Relacionamentos',
                'Carreira',
                'Finanças'
            ]);
            $table->integer('objetivo_total')->nullable();
            $table->dateTime('data_criacao');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('avaliacaos');
    }
}
