<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Provincia;
use App\Models\Categoria;

class Proyectos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proyect = Proyecto::create([
            'name' => 'Proyecto Prueba 1',
            'direccion' => 'Calle 59 #262 COL. CENTRO',
            'descripcion' => 'Descipcion de prueba',
            'destacado' => 0,
            'texto_destacado' => 'Texto destacado de prueba',
            'texto_proyecto' => 'Texto destacado de prueba',
            'estado_id' => 0,
        ]);
        $region = Region::findOrFail(15);
        $region->proyects()->save($proyect);
        $comuna = Comuna::findOrFail(176);
        $comuna->proyects()->save($proyect);
        $provincia = Provincia::findOrFail(31);
        $provincia->proyects()->save($proyect);
        $cat= Categoria::findOrFail(1);
        $cat->proyects()->save($proyect);

        $proyect2 = Proyecto::create([
            'name' => 'Proyecto Prueba 2',
            'direccion' => 'Calle Colon #252 COL. NORTE',
            'descripcion' => 'Descipcion de prueba2',
            'destacado' => 0,
            'texto_destacado' => 'Texto destacado de prueba2',
            'texto_proyecto' => 'Texto destacado de prueba2',
            'estado_id' => 0,
        ]);
        $region = Region::findOrFail(15);
        $region->proyects()->save($proyect2);
        $comuna = Comuna::findOrFail(176);
        $comuna->proyects()->save($proyect2);
        $provincia = Provincia::findOrFail(31);
        $provincia->proyects()->save($proyect2);
        $cat= Categoria::findOrFail(3);
        $cat->proyects()->save($proyect2);
    }
}
