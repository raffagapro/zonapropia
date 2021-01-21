<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Region::create([
        'name' => 'arica y parinacota',
      ]);
      Region::create([
        'name' => 'tarapacá',
      ]);
      Region::create([
        'name' => 'antofagasta',
      ]);
      Region::create([
        'name' => 'atacama',
      ]);
      Region::create([
        'name' => 'coquimbo',
      ]);
      Region::create([
        'name' => 'valparaíso',
      ]);
      Region::create([
        'name' => 'ohiggins',
      ]);
      Region::create([
        'name' => 'ñuble',
      ]);
      Region::create([
        'name' => 'biobío',
      ]);
      Region::create([
        'name' => 'la araucanía',
      ]);
      Region::create([
        'name' => 'los ríos',
      ]);
      Region::create([
        'name' => 'los lagos',
      ]);
      Region::create([
        'name' => 'aysén',
      ]);
      Region::create([
        'name' => 'santiago',
      ]);
      Region::create([
        'name' => 'maule',
      ]);
      Region::create([
        'name' => 'magallanes',
      ]);
    }
}
