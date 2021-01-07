<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Taggable;

class Tags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Taggable::create([
        'name' => 'vivir',
      ]);
      Taggable::create([
        'name' => 'inversion',
      ]);
      Taggable::create([
        'name' => 'nuevo proyecto',
      ]);
      Taggable::create([
        'name' => 'ultima unidad',
      ]);
      Taggable::create([
        'name' => 'sustentable',
      ]);
      Taggable::create([
        'name' => 'venta en verde',
      ]);
      Taggable::create([
        'name' => 'entrega inmediata',
      ]);
    }
}
