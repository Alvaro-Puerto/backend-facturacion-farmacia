<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Crear usuarios

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@localhost.com',
                'password' => bcrypt('admin')
            ],
            
        ]);

        $faker = Faker::create();

        // Crear 10 usuarios
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password' . $i)
            ]);

            // Asignar todos los permisos a cada usuario
           
        }


        $users = User::all();

        $rol = Role::create(['name' => 'admin', 'guard_name' => 'web']);

        $permissions = Permission::all();

        $rol->syncPermissions($permissions);


        foreach ($users as $user) {
            $user->assignRole('admin');
        }
        
    }
}
