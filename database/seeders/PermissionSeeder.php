<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('permissions')->delete();

        $admin=Role::find('1');
        $grafitex=Role::find('2');
        $sgh=Role::find('3');
        $tienda=Role::find('4');
        $proveedor=Role::find('5');

        // Users
        Permission::create(['name'=>'user.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'user.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'user.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'user.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'user.delete'])->syncRoles($admin, $grafitex);

        // Roles
        Permission::create(['name'=>'role.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'role.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'role.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'role.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'role.delete'])->syncRoles($admin, $grafitex);

        // Permisos
        Permission::create(['name'=>'permiso.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'permiso.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'permiso.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'permiso.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'permiso.delete'])->syncRoles($admin, $grafitex);

        // Seguridad
        Permission::create(['name'=>'seguridad.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'seguridad.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'seguridad.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'seguridad.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'seguridad.delete'])->syncRoles($admin, $grafitex);

        // campaign
        Permission::create(['name'=>'campaign.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'campaign.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'campaign.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'campaign.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'campaign.delete'])->syncRoles($admin, $grafitex);

        // presupuestos
        Permission::create(['name'=>'presupuestos.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'presupuestos.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'presupuestos.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'presupuestos.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'presupuestos.delete'])->syncRoles($admin, $grafitex);

        // store
        Permission::create(['name'=>'stores.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'store.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'stores.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'stores.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'store.delete'])->syncRoles($admin, $grafitex);

        // elemento
        Permission::create(['name'=>'elemento.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'elemento.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'elemento.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'elemento.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'elemento.delete'])->syncRoles($admin, $grafitex);

        // storeelementos
        Permission::create(['name'=>'storeelementos.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'storeelementos.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'storeelementos.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'storeelementos.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'storeelementos.delete'])->syncRoles($admin, $grafitex);

        // tarifa
        Permission::create(['name'=>'tarifa.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'tarifa.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'tarifa.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'tarifa.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'tarifa.delete'])->syncRoles($admin, $grafitex);

        // tarifafamilia
        Permission::create(['name'=>'tarifafamilia.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'tarifafamilia.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'tarifafamilia.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'tarifafamilia.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'tarifafamilia.delete'])->syncRoles($admin, $grafitex);

        // maestro
        Permission::create(['name'=>'maestro.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'maestro.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'maestro.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'maestro.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'maestro.delete'])->syncRoles($admin, $grafitex);

        // auxiliares
        Permission::create(['name'=>'auxiliares.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'auxiliares.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'auxiliares.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'auxiliares.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'auxiliares.delete'])->syncRoles($admin, $grafitex);

        // Entidades
        Permission::create(['name'=>'entidad.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'entidad.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'entidad.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'entidad.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'entidad.delete'])->syncRoles($admin, $grafitex);

        // Entidades contactos
        Permission::create(['name'=>'entidadcontacto.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'entidadcontacto.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'entidadcontacto.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'entidadcontacto.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'entidadcontacto.delete'])->syncRoles($admin, $grafitex);

        // // tiendas
        Permission::create(['name'=>'tiendas.index'])->syncRoles($admin, $grafitex, $tienda);
        Permission::create(['name'=>'tiendas.create'])->syncRoles($admin, $grafitex, $tienda);
        Permission::create(['name'=>'tiendas.edit'])->syncRoles($admin, $grafitex, $tienda);
        Permission::create(['name'=>'tiendas.update'])->syncRoles($admin, $grafitex, $tienda);
        Permission::create(['name'=>'tiendas.delete'])->syncRoles($admin, $grafitex, $tienda);

        // Plan
        Permission::create(['name'=>'plan.index'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'plan.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'plan.edit'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'plan.update'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'plan.delete'])->syncRoles($admin, $grafitex);

        // plantienda
        Permission::create(['name'=>'plantienda.index'])->syncRoles($admin, $grafitex,$sgh,$proveedor);
        Permission::create(['name'=>'plantienda.create'])->syncRoles($admin, $grafitex);
        Permission::create(['name'=>'plantienda.edit'])->syncRoles($admin, $grafitex,$proveedor);
        Permission::create(['name'=>'plantienda.update'])->syncRoles($admin, $grafitex,$proveedor);
        Permission::create(['name'=>'plantienda.delete'])->syncRoles($admin, $grafitex);
    }
}
