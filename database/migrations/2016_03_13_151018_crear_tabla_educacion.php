<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEducacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('educacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->index('idUsuario');
            $table->foreign('idUsuario')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->integer('idTipoeducacion');
            $table->string('titulo',100);
            $table->string('institucion',60);
            $table->string('anio',5);
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
         Schema::drop('educacion');
    }
}
