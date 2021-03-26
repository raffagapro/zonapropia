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
        'color' => 'primary',
        'visibility' => 0,
      ]);
      Taggable::create([
        'name' => 'inversion',
        'color' => 'success',
        'visibility' => 0,
        ]);
      Taggable::create([
        'name' => 'nuevo proyecto',
        'color' => 'warning',
        'visibility' => 0,
        ]);
      Taggable::create([
        'name' => 'ultima unidad',
        'color' => 'danger',
        'visibility' => 0,
        ]);
      Taggable::create([
        'name' => 'sustentable',
        'color' => 'success',
        'visibility' => 0,
      ]);
      Taggable::create([
        'name' => 'venta en verde',
        'color' => 'success',
        'visibility' => 0,
      ]);
      Taggable::create([
        'name' => 'entrega inmediata',
        'color' => 'danger',
        'visibility' => 0,
      ]);
    }
}
