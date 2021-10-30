<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Reset cached roles and permissions
      app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

      // create permissions
      Permission::create(['name' => 'Crear cursos']);
      Permission::create(['name' => 'Leer cursos']);
      Permission::create(['name' => 'Actualizar cursos']);
      Permission::create(['name' => 'Eliminar cursos']);

      Permission::create(['name' => 'Ver tablero']);

      Permission::create(['name' => 'Crear rol']);
      Permission::create(['name' => 'Leer rol']);
      Permission::create(['name' => 'Actualizar rol']);
      Permission::create(['name' => 'Eliminar rol']);

      Permission::create(['name' => 'Leer usuarios']);
        Permission::create(['name' => 'Actualizar usuarios']);

      // create roles and assign created permissions

      // this can be done as separate statements
      $roleAdmin = Role::create(['name' => 'Admin']);
      $roleAdmin->givePermissionTo(Permission::all());

      $roleInstructor = Role::create(['name' => 'Instructor']);
      $roleInstructor->givePermissionTo(['Crear cursos', 'Leer cursos', 'Actualizar cursos', 'Eliminar cursos']);

    //   // or may be done by chaining
    //   $role = Role::create(['name' => 'moderator'])
    //       ->givePermissionTo(['publish articles', 'unpublish articles']);

    //   $role = Role::create(['name' => 'super-admin']);
    //   $role->givePermissionTo(Permission::all());
    }
}
