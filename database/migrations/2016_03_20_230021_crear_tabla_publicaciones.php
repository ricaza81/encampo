<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPublicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->index('idUsuario');
            $table->foreign('idUsuario') ->references('id')->on('users') ->onDelete('cascade');  //llave foranea
            $table->integer('idTipopublicacion');
            $table->string('titulo',150);
            $table->string('autores',100);
            $table->string('universidad',60);
            $table->string('anio',5);
            $table->string('pais',40);
            $table->string('revista',100);
            $table->string('volumen',10);
            $table->string('numero',5);
            $table->string('pageI',5);
            $table->string('pageF',5);
            $table->string('volumenL',10);
            $table->string('numeroL',5);
            $table->string('ciudad',40);
            $table->string('edicion',40);
            $table->string('editorial',40);
            $table->string('ruta',150);
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
        Schema::drop('publicaciones');
    }
}
