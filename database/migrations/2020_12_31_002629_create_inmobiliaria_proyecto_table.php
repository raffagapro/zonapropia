<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmobiliariaProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmobiliaria_proyecto', function (Blueprint $table) {
            $table->id();
            $table->integer('inmobiliaria_id')->unsigned()->nullable()->onDelete('cascade');
            $table->integer('proyecto_id')->unsigned()->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('inmobiliaria_proyecto');
    }
}
