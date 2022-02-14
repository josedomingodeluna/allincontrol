<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = Role::create(['name' => 'Administrador']);

        Permission::create(['name' => 'dashboard', 'description'=>'Acceso a Dashboard'])->syncRoles([$administrator]);
        Permission::create(['name' => 'see-branch', 'description'=>'Ver Catalogo Sucursales'])->syncRoles([$administrator]);
        Permission::create(['name' => 'see-folio', 'description'=>'Ver Catalogo Folio'])->syncRoles([$administrator]);
        Permission::create(['name' => 'see-category', 'description'=>'Ver Catalogo Categoria'])->syncRoles([$administrator]);
        // Seguridad
        Permission::create(['name' => 'see-security', 'description'=>'Ver Menu Seguridad'])->syncRoles([$administrator]);
        Permission::create(['name' => 'security-index', 'description'=>'Ver Usuarios'])->syncRoles([$administrator]);
        Permission::create(['name' => 'security-create', 'description'=>'registrar Usuarios'])->syncRoles([$administrator]);

        Permission::create(['name' => 'see-product', 'description'=>'Ver Catalogo Productos'])->syncRoles([$administrator]);
        Permission::create(['name' => 'see-employee', 'description'=>'Ver Catalogo Empleados'])->syncRoles([$administrator]);
        Permission::create(['name' => 'see-customer', 'description'=>'Ver Catalogo Clientes'])->syncRoles([$administrator]);
    }
}
