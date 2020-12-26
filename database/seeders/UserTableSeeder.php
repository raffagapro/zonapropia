<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $super_admin = Role::where('name', 'super admin')->first();
      $admin = Role::where('name', 'admin')->first();
      $super = Role::where('name', 'supervisor')->first();
      $socio = Role::where('name', 'socio')->first();
      $vendedor = Role::where('name', 'vendedor')->first();
      $user_role = Role::where('name', 'usuario')->first();

      $user1 = new User();
      $user1->name = 'admin';
      $user1->email = 'admin@admin.com';
      $user1->password = '$2y$10$qiY2g.heQwFEgcirI/hG8enLIPl6aEXEZdSeEEOfvVXm52E8N46pW';
      $user1->save();
      $user1->roles()->attach($super_admin);

    }
}
