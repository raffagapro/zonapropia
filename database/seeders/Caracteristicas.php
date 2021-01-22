<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Caracteristica;


class Caracteristicas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Caracteristica::create([
        'name' => 'piscina',
        'icono' => 'fas fa-swimmer',
        'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
      ]);
      Caracteristica::create([
        'name' => 'áreas verdes',
        'icono' => 'fab fa-pagelines',
        'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
      ]);
      Caracteristica::create([
        'name' => 'gimnasio',
        'icono' => 'fas fa-dumbbell',
        'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
      ]);
      Caracteristica::create([
        'name' => 'áreas comunes',
        'icono' => 'fas fa-universal-access',
        'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
      ]);
    }
}
