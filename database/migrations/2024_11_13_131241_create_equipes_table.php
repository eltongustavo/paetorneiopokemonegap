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
        Schema::create('equipes', function (Blueprint $table) {
            $table->string('nome_usuario');
            $table->enum('avatar', ['masculino1', 'masculino2', 'masculino3', 'feminina1', 'feminina2', 'feminina3']);
            $table->boolean('validacao_time')->default(false);
            $table->string('pokemon1', 50);
            $table->string('pokemon2', 50);
            $table->string('pokemon3', 50);
            $table->string('pokemon4', 50);
            $table->string('pokemon5', 50);
            $table->string('pokemon6', 50);
            $table->foreign('nome_usuario')->references('nome')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('equipes');
    }
};
