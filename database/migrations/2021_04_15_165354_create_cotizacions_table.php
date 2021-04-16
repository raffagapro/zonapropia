<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('rut');
            $table->string('phone');
            $table->string('email');
            $table->string('name');
            $table->integer('user_id')->unsigned()->nullable()->onDelete('cascade');
            $table->integer('proyecto_id')->unsigned()->nullable()->onDelete('cascade');
            $table->integer('unidad_id')->unsigned()->nullable()->onDelete('cascade');
            $table->integer('estacionamiento_id')->unsigned()->nullable()->onDelete('cascade');
            $table->integer('status')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacions');
    }
}
