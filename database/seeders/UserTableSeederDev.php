<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeederDev extends Seeder
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
      $user1->name = 'cami';
      $user1->email = 'cami@gmail.com';
      $user1->password = '$2y$10$qiY2g.heQwFEgcirI/hG8enLIPl6aEXEZdSeEEOfvVXm52E8N46pW';
      $user1->save();
      $user1->roles()->attach($user_role);

      $user2 = new User();
      $user2->name = 'bran';
      $user2->email = 'bran@gmail.com';
      $user2->password = '$2y$10$qiY2g.heQwFEgcirI/hG8enLIPl6aEXEZdSeEEOfvVXm52E8N46pW';
      $user2->save();
      $user2->roles()->attach($user_role);

      $user3 = new User();
      $user3->name = 'juan';
      $user3->email = 'juan@gmail.com';
      $user3->password = '$2y$10$qiY2g.heQwFEgcirI/hG8enLIPl6aEXEZdSeEEOfvVXm52E8N46pW';
      $user3->save();
      $user3->roles()->attach($user_role);

      $user4 = new User();
      $user4->name = 'karla';
      $user4->email = 'karla@gmail.com';
      $user4->password = '$2y$10$qiY2g.heQwFEgcirI/hG8enLIPl6aEXEZdSeEEOfvVXm52E8N46pW';
      $user4->save();
      $user4->roles()->attach($user_role);

      $user5 = new User();
      $user5->name = 'gloria';
      $user5->email = 'gloria@gmail.com';
      $user5->password = '$2y$10$qiY2g.heQwFEgcirI/hG8enLIPl6aEXEZdSeEEOfvVXm52E8N46pW';
      $user5->save();
      $user5->roles()->attach($user_role);

      $user6 = new User();
      $user6->name = 'alessa';
      $user6->email = 'alessa@gmail.com';
      $user6->password = '$2y$10$qiY2g.heQwFEgcirI/hG8enLIPl6aEXEZdSeEEOfvVXm52E8N46pW';
      $user6->save();
      $user6->roles()->attach($user_role);

    }
}
