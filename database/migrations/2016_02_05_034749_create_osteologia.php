<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsteologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('osteologia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('region');
            $table->string('grupo');
            $table->string('idshape');
            $table->string('idmaterial');
            $table->string('descripcion');
            $table->string('descripcion2');
            $table->rememberToken();
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
       Schema::drop('osteologia');
   }
}
