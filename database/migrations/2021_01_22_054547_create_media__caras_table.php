<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaCarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media__caras', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('loc');
            $table->integer('proyecto_id')->nullable()->onDelete('cascade');
            $table->integer('caracteristica_id')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('media__caras');
    }
}
