<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;


class CategoriasTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Categoria::create([
        'name' => 'departamento',
      ]);
      Categoria::create([
        'name' => 'casa',
      ]);
      Categoria::create([
        'name' => 'terreno',
      ]);
      Categoria::create([
        'name' => 'bodega',
      ]);
      Categoria::create([
        'name' => 'estacionamiento',
      ]);
      Categoria::create([
        'name' => 'oficina',
      ]);
      Categoria::create([
        'name' => 'proyecto departamento',
      ]);
      Categoria::create([
        'name' => 'proyecto casa',
      ]);
      Categoria::create([
        'name' => 'proyecto lote',
      ]);
      Categoria::create([
        'name' => 'proyecto oficina',
      ]);
      Categoria::create([
        'name' => 'proyecto local comercial',
      ]);
    }
}
