<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('direccion');
            $table->string('comuna_id')->nullable();
            $table->string('provincia_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->longText('descripcion')->nullable();
            $table->decimal('latitud', 13, 7)->nullable();
            $table->decimal('longitud', 13, 7)->nullable();
            $table->integer('destacado')->nullable();
            $table->string('texto_destacado')->nullable();
            $table->tinyInteger('activo')->nullable();
            $table->tinyInteger('bono_pie')->nullable();
            $table->decimal('bono_pie_monto', 6, 2)->nullable();
            $table->integer('cuota_pie')->nullable();
            $table->decimal('cuota_monto', 6, 2)->nullable();
            $table->date('cuota_pie_fecha_limite')->nullable();
            $table->tinyInteger('ver_bono_pie')->nullable();
            $table->tinyInteger('ver_cuota_mensual')->nullable();
            $table->tinyInteger('ver_dividendo')->nullable();
            $table->tinyInteger('ver_precio')->nullable();
            $table->tinyInteger('ver_metrajes')->nullable();
            $table->longText('terminos')->nullable();
            $table->mediumText('texto_proyecto')->nullable();
            $table->integer('estado_id')->nullable();
            $table->integer('inmobiliaria_id')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->integer('minRooms')->nullable();
            $table->integer('maxRooms')->nullable();
            $table->integer('minBathrooms')->nullable();
            $table->integer('maxBathrooms')->nullable();
            $table->integer('minMC')->nullable();
            $table->integer('maxMC')->nullable();
            $table->integer('etapa_venta')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->integer('seguridad')->nullable();
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
        Schema::dropIfExists('proyectos');
    }
}
