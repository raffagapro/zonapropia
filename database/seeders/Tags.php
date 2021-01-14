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
        'color' => 'primary'
      ]);
      Taggable::create([
        'name' => 'inversion',
        'color' => 'success'
      ]);
      Taggable::create([
        'name' => 'nuevo proyecto',
        'color' => 'warning'
      ]);
      Taggable::create([
        'name' => 'ultima unidad',
        'color' => 'danger'
      ]);
      Taggable::create([
        'name' => 'sustentable',
        'color' => 'success'
      ]);
      Taggable::create([
        'name' => 'venta en verde',
        'color' => 'success'
      ]);
      Taggable::create([
        'name' => 'entrega inmediata',
        'color' => 'danger'
      ]);
    }
}
