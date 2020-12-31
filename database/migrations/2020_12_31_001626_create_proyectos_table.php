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
            $table->string('comuna');
            $table->string('ciudad');
            $table->string('region');
            $table->longText('descripcion');
            $table->decimal('latitud', $precision = 13, $scale = 10);
            $table->decimal('longitud', $precision = 13, $scale = 10);
            $table->integer('destacado');
            $table->string('texto_destacado');
            $table->tinyInteger('activo');
            $table->tinyInteger('bono_pie');
            $table->decimal('bono_pie_monto', $precision = 6, $scale = 2);
            $table->integer('cuota_pie');
            $table->decimal('cuota_monto', $precision = 6, $scale = 2);
            $table->date('cuota_pie_fecha_limite');
            $table->tinyInteger('ver_bono_pie');
            $table->tinyInteger('ver_cuota_mensual');
            $table->tinyInteger('ver_dividendo');
            $table->tinyInteger('ver_precio');
            $table->tinyInteger('ver_metrajes');
            $table->longText('terminos');
            $table->mediumText('texto_proyecto');
            $table->integer('estado_id');
            $table->integer('inmobiliaria_id');
            $table->integer('categoria_id');
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
