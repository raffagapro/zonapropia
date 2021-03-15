<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidads', function (Blueprint $table) {
            $table->id();
            $table->integer('proyecto_id')->unsigned()->nullable()->onDelete('cascade');
            $table->string('modelo')->nullable();;
            $table->string('code')->nullable();
            $table->string('orientacion')->nullable();
            $table->string('piso')->nullable();
            $table->integer('dormitorios')->nullable();
            $table->integer('banos')->nullable();
            $table->integer('lote')->nullable();
            $table->decimal('superficie_municipal', 6, 2)->nullable();
            $table->decimal('superficie_total', 6, 2)->nullable();
            $table->decimal('superficie_inferior', 6, 2)->nullable();
            $table->decimal('superficie_terrazas', 6, 2)->nullable();
            $table->decimal('superficie_loggia', 6, 2)->nullable();
            $table->decimal('precio_lista', 6, 2)->nullable();
            $table->decimal('precio_venta', 6, 2)->nullable();
            $table->string('status')->nullable();
            $table->integer('vulnerable')->nullable();
            $table->decimal('uf_m2', 6)->nullable();
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
        Schema::dropIfExists('unidads');
    }
}
