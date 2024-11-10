<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'crear roles']);
        Permission::create(['name' => 'ver roles']);
        Permission::create(['name' => 'editar roles']);
        Permission::create(['name' => 'configurar roles']);

        Permission::create(['name' => 'crear bodegas']);
        Permission::create(['name' => 'ver bodegas']);
        Permission::create(['name' => 'editar bodegas']);
        Permission::create(['name' => 'configurar bodegas']);


        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'configurar usuarios']);

        Permission::create(['name' => 'ver unidades de medida']);

        Permission::create(['name' => 'crear permisos']);
        Permission::create(['name' => 'ver permisos']);
        Permission::create(['name' => 'editar permisos']);
        Permission::create(['name' => 'configurar permisos']);

        Permission::create(['name' => 'crear articulos']);
        Permission::create(['name' => 'ver articulos']);
        Permission::create(['name' => 'editar articulos']);
        Permission::create(['name' => 'configurar articulos']);

        Permission::create(['name' => 'crear clientes']);
        Permission::create(['name' => 'ver clientes']);
        Permission::create(['name' => 'editar clientes']);
        Permission::create(['name' => 'configurar clientes']);

        Permission::create(['name' => 'crear ventas']);
        Permission::create(['name' => 'ver ventas']);
        Permission::create(['name' => 'editar ventas']);
        Permission::create(['name' => 'configurar ventas']);

        
    }
}
