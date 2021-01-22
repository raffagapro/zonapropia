<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RegionesTable::class);
        $this->call(CategoriasTable::class);
        $this->call(Tags::class);
        $this->call(Provincias::class);
        $this->call(Comunas::class);
        $this->call(Caracteristicas::class);
    }
}
