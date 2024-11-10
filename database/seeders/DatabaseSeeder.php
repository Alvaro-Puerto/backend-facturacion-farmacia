<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        // \App\Models\User::factory(10)->create();
      
        
            Permission::create(['name' => 'respaldo bd']);

            $this->call([
                PermissionSeed::class,
                UserSeed::class,
            ]);

            /*
            DB::table('u_m_s')->insert([
                [
                    'nombre' => 'Kilogramo',
                    'abreviatura' => 'kg',
                    'descripcion' => 'Unidad de masa',
                    'usuario_id'=> 1,
                ],
                [
                    'nombre' => 'Metro',
                    'abreviatura' => 'm',
                    'descripcion' => 'Unidad de longitud',
                    'usuario_id'=> 1,
                ],
                [
                    'nombre' => 'Segundo',
                    'abreviatura' => 's',
                    'descripcion' => 'Unidad de tiempo',
                    'usuario_id'=> 1,
                ],
                [
                    'nombre' => 'Amperio',
                    'abreviatura' => 'A',
                    'descripcion' => 'Unidad de corriente eléctrica',
                    'usuario_id'=> 1,
                ],
                [
                    'nombre' => 'Kelvin',
                    'abreviatura' => 'K',
                    'descripcion' => 'Unidad de temperatura termodinámica',
                    'usuario_id'=> 1,
                ],
                [
                    'nombre' => 'Mol',
                    'abreviatura' => 'mol',
                    'descripcion' => 'Unidad de cantidad de sustancia'
                ],
                [
                    'nombre' => 'Candela',
                    'abreviatura' => 'cd',
                    'descripcion' => 'Unidad de intensidad luminosa',
                    'usuario_id'=> 1,
                ],]);*/
    
    }
}
