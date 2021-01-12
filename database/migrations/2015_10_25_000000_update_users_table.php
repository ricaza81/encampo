<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            

             $table->string('nombres', 60);
             $table->string('apellidos', 60);
             $table->integer('pais');
             $table->string('ciudad', 60);
             $table->string('institucion', 100);
             $table->string('ocupacion', 60);

        });
    }

 
}
