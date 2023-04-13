<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create(['name'=>'Usuarios Navegar','slug'=>'user.index','description'=>'Lista todos los usuarios del sistema',]);
        Permission::create(['name'=>'Usuarios Ver detalle','slug'=>'users.show','description'=>'Ver en detalle cada usuario del sistema',]);
        Permission::create(['name'=>'Usuarios Crear','slug'=>'user.create','description'=>'Crea un usuario en el sistema',]);
        Permission::create(['name'=>'Usuarios Editar','slug'=>'user.edit','description'=>'Edita cada usuario del sistema',]);
        Permission::create(['name'=>'Usuarios Eliminar','slug'=>'user.destroy','description'=>'Elimina el usuario del sistema',]);

        //Roles
        Permission::create(['name'=>'Roles Navegar','slug'=>'roles.index','description'=>'Lista todos los Roles del sistema',]);
        Permission::create(['name'=>'Roles Ver detalle','slug'=>'roles.show','description'=>'Ver en detalle cada rol del sistema',]);
        Permission::create(['name'=>'Roles Crear','slug'=>'roles.create','description'=>'Crea un rol en el sistema',]);
        Permission::create(['name'=>'Roles Editar','slug'=>'roles.edit','description'=>'Edita cada rol del sistema',]);
        Permission::create(['name'=>'Roles Eliminar','slug'=>'roles.destroy','description'=>'Elimina el rol del sistema',]);

        //Permisos
        Permission::create(['name'=>'Permisos Navegar','slug'=>'permission.index','description'=>'Lista todos los Permisos del sistema',]);
        Permission::create(['name'=>'Permisos Ver detalle','slug'=>'permission.show','description'=>'Ver en detalle cada permiso del sistema',]);
        Permission::create(['name'=>'Permisos Crear','slug'=>'permission.create','description'=>'Crea un permiso en el sistema',]);
        Permission::create(['name'=>'Permisos Editar','slug'=>'permission.edit','description'=>'Edita cada permiso del sistema',]);
        Permission::create(['name'=>'Permisos Eliminar','slug'=>'permission.destroy','description'=>'Elimina el permiso del sistema',]);

        //Seguridad
        Permission::create(['name'=>'Seguridad Navegar','slug'=>'seguridadindex','description'=>'Lista todos los Seguridad del sistema',]);
        Permission::create(['name'=>'Seguridad Ver detalle','slug'=>'seguridadshow','description'=>'Ver en detalle cada seguridad del sistema',]);
        Permission::create(['name'=>'Seguridad Crear','slug'=>'seguridadcreate','description'=>'Crea un seguridad en el sistema',]);
        Permission::create(['name'=>'Seguridad Editar','slug'=>'seguridadedit','description'=>'Edita cada seguridad del sistema',]);
        Permission::create(['name'=>'Seguridad Eliminar','slug'=>'seguridaddestroy','description'=>'Elimina el seguridad del sistema',]);

        //campaign
        Permission::create(['name'=>'Campañas Navegar','slug'=>'campaign.index','description'=>'Lista todos los Campañas del sistema',]);
        Permission::create(['name'=>'Campañas Ver detalle','slug'=>'campaign.show','description'=>'Ver en detalle cada campaña del sistema',]);
        Permission::create(['name'=>'Campañas Crear','slug'=>'campaign.create','description'=>'Crea un campaña en el sistema',]);
        Permission::create(['name'=>'Campañas Editar','slug'=>'campaign.edit','description'=>'Edita cada campaña del sistema',]);
        Permission::create(['name'=>'Campañas Eliminar','slug'=>'campaign.destroy','description'=>'Elimina el campaña del sistema',]);

        // Presupuestos
        Permission::create(['name'=>'Presupuestos Navegar','slug'=>'presupuesto.index','description'=>'Lista todos los Presupuestos del sistema',]);
        Permission::create(['name'=>'Presupuestos Ver detalle','slug'=>'presupuesto.show','description'=>'Ver en detalle cada prespuesto del sistema',]);
        Permission::create(['name'=>'Presupuestos Crear','slug'=>'presupuesto.create','description'=>'Crea un prespuesto en el sistema',]);
        Permission::create(['name'=>'Presupuestos Editar','slug'=>'presupuesto.edit','description'=>'Edita cada prespuesto del sistema',]);
        Permission::create(['name'=>'Presupuestos Eliminar','slug'=>'presupuesto.destroy','description'=>'Elimina el prespuesto del sistema',]);

        //Store
        Permission::create(['name'=>'Stores Navegar','slug'=>'stores.index','description'=>'Lista todos los Stores del sistema',]);
        Permission::create(['name'=>'Stores Ver detalle','slug'=>'store.show','description'=>'Ver en detalle cada store del sistema',]);
        Permission::create(['name'=>'Stores Crear','slug'=>'store.create','description'=>'Crea un store en el sistema',]);
        Permission::create(['name'=>'Stores Editar','slug'=>'stores.edit','description'=>'Edita cada store del sistema',]);
        Permission::create(['name'=>'Stores Eliminar','slug'=>'stores.destroy','description'=>'Elimina el store del sistema',]);

        //Elementos
        Permission::create(['name'=>'Elementos Navegar','slug'=>'elemento.index','description'=>'Lista todos los Elementos del sistema',]);
        Permission::create(['name'=>'Elementos Ver detalle','slug'=>'elemento.show','description'=>'Ver en detalle cada elemento del sistema',]);
        Permission::create(['name'=>'Elementos Crear','slug'=>'elemento.create','description'=>'Crea un elemento en el sistema',]);
        Permission::create(['name'=>'Elementos Editar','slug'=>'elemento.edit','description'=>'Edita cada elemento del sistema',]);
        Permission::create(['name'=>'Elementos Eliminar','slug'=>'elemento.destroy','description'=>'Elimina el elemento del sistema',]);

        //Store Elementos
        Permission::create(['name'=>'Store Elementos Navegar','slug'=>'storeelementos.index','description'=>'Lista todos los Store Elementos del sistema',]);
        Permission::create(['name'=>'Store Elementos Ver detalle','slug'=>'storeelementos.show','description'=>'Ver en detalle cada elemento de la store del sistema',]);
        Permission::create(['name'=>'Store Elementos Crear','slug'=>'storeelementos.create','description'=>'Crea un elemento en una store en el sistema',]);
        Permission::create(['name'=>'Store Elementos Editar','slug'=>'storeelementos.edit','description'=>'Edita cada elemento de cada store del sistema',]);
        Permission::create(['name'=>'Store Elementos Eliminar','slug'=>'storeelementos.destroy','description'=>'Elimina el elemento de la store del sistema',]);

        //Tarifas
        Permission::create(['name'=>'Tarifas Navegar','slug'=>'tarifa.index','description'=>'Lista todos los Tarifas del sistema',]);
        Permission::create(['name'=>'Tarifas Ver detalle','slug'=>'tarifa.show','description'=>'Ver en detalle cada tarifa del sistema',]);
        Permission::create(['name'=>'Tarifas Crear','slug'=>'tarifa.create','description'=>'Crea un tarifa en el sistema',]);
        Permission::create(['name'=>'Tarifas Editar','slug'=>'tarifa.edit','description'=>'Edita cada tarifa del sistema',]);
        Permission::create(['name'=>'Tarifas Eliminar','slug'=>'tarifa.destroy','description'=>'Elimina el tarifa del sistema',]);

        //Tarifas Familias
        Permission::create(['name'=>'Tarifa Familia Navegar','slug'=>'tarifafamilia.index','description'=>'Lista todos los Tarifa Familia del sistema',]);
        Permission::create(['name'=>'Tarifa Familia Ver detalle','slug'=>'tarifafamilia.show','description'=>'Ver en detalle cada tarifa familia del sistema',]);
        Permission::create(['name'=>'Tarifa Familia Crear','slug'=>'tarifafamilia.create','description'=>'Crea un tarifa familia en el sistema',]);
        Permission::create(['name'=>'Tarifa Familia Editar','slug'=>'tarifafamilia.edit','description'=>'Edita cada tarifa familia del sistema',]);
        Permission::create(['name'=>'Tarifa Familia Eliminar','slug'=>'tarifafamilia.destroy','description'=>'Elimina el tarifa familia del sistema',]);

        //Maestro
        Permission::create(['name'=>'Maestro Navegar','slug'=>'maestro.index','description'=>'Lista todos los Maestro del sistema',]);
        Permission::create(['name'=>'Maestro Ver detalle','slug'=>'maestro.show','description'=>'Ver en detalle cada Maestro del sistema',]);
        Permission::create(['name'=>'Maestro Crear','slug'=>'maestro.create','description'=>'Crea un Maestro en el sistema',]);
        Permission::create(['name'=>'Maestro Editar','slug'=>'maestro.edit','description'=>'Edita cada Maestro del sistema',]);
        Permission::create(['name'=>'Maestro Eliminar','slug'=>'maestro.destroy','description'=>'Elimina el Maestro del sistema',]);

        //Auxiliares
        Permission::create(['name'=>'Auxiliares Navegar','slug'=>'auxiliares.index','description'=>'Lista todos los Auxiliares del sistema',]);
        Permission::create(['name'=>'Auxiliares Ver detalle','slug'=>'auxiliares.show','description'=>'Ver en detalle cada Auxiliares del sistema',]);
        Permission::create(['name'=>'Auxiliares Crear','slug'=>'auxiliares.create','description'=>'Crea un Auxiliares en el sistema',]);
        Permission::create(['name'=>'Auxiliares Editar','slug'=>'auxiliares.edit','description'=>'Edita cada Auxiliares del sistema',]);
        Permission::create(['name'=>'Auxiliares Eliminar','slug'=>'auxiliares.destroy','description'=>'Elimina el Auxiliar del sistema',]);

        //Entidad
        Permission::create(['name'=>'Entidades Navegar','slug'=>'entidad.index','description'=>'Lista todos las Entidades del sistema',]);
        Permission::create(['name'=>'Entidades Ver detalle','slug'=>'entidad.show','description'=>'Ver en detalle cada Entidades del sistema',]);
        Permission::create(['name'=>'Entidades Crear','slug'=>'entidad.create','description'=>'Crea una Entidad en el sistema',]);
        Permission::create(['name'=>'Entidades Editar','slug'=>'entidad.edit','description'=>'Edita cada Entidad del sistema',]);
        Permission::create(['name'=>'Entidades Eliminar','slug'=>'entidad.destroy','description'=>'Elimina la entidad del sistema',]);

        //Entidad contacto
        Permission::create(['name'=>'Contactos Navegar','slug'=>'entidadcontacto.index','description'=>'Lista todos los Contactos del sistema',]);
        Permission::create(['name'=>'Contactos Ver detalle','slug'=>'entidadcontacto.show','description'=>'Ver en detalle cada Contacto del sistema',]);
        Permission::create(['name'=>'Contactos Crear','slug'=>'entidadcontacto.create','description'=>'Crea un Contacto en el sistema',]);
        Permission::create(['name'=>'Contactos Editar','slug'=>'entidadcontacto.edit','description'=>'Edita cada Contacto del sistema',]);
        Permission::create(['name'=>'Contactos Eliminar','slug'=>'entidadcontacto.destroy','description'=>'Elimina el Contacto del sistema',]);

        //Tiendas
        Permission::create(['name'=>'Tiendas Navegar','slug'=>'tiendasindex','description'=>'Lista todos las Tiendas del sistema',]);
        Permission::create(['name'=>'Tiendas Ver detalle','slug'=>'tiendasshow','description'=>'Ver en detalle cada Tienda del sistema',]);
        Permission::create(['name'=>'Tiendas Crear','slug'=>'tiendascreate','description'=>'Crea una Tienda en el sistema',]);
        Permission::create(['name'=>'Tiendas Editar','slug'=>'tiendasedit','description'=>'Edita cada Tienda del sistema',]);
        Permission::create(['name'=>'Tiendas Eliminar','slug'=>'tiendasdestroy','description'=>'Elimina la Tienda del sistema',]);

        //Plan
        Permission::create(['name'=>'Plan Navegar','slug'=>'plan.index','description'=>'Lista todos los Plan del sistema',]);
        Permission::create(['name'=>'Plan Ver detalle','slug'=>'plan.show','description'=>'Ver en detalle cada Plan del sistema',]);
        Permission::create(['name'=>'Plan Crear','slug'=>'plan.create','description'=>'Crea un Plan en el sistema',]);
        Permission::create(['name'=>'Plan Editar','slug'=>'plan.edit','description'=>'Edita cada Plan del sistema',]);
        Permission::create(['name'=>'Plan Eliminar','slug'=>'plan.destroy','description'=>'Elimina el Plan del sistema',]);

        //Plantienda
        Permission::create(['name'=>'Plantienda Navegar','slug'=>'plantienda.index','description'=>'Lista todos los Plantienda del sistema',]);
        Permission::create(['name'=>'Plantienda Ver detalle','slug'=>'plantienda.show','description'=>'Ver en detalle cada Plantienda del sistema',]);
        Permission::create(['name'=>'Plantienda Crear','slug'=>'plantienda.create','description'=>'Crea un Plantienda en el sistema',]);
        Permission::create(['name'=>'Plantienda Editar','slug'=>'plantienda.edit','description'=>'Edita cada Plantienda del sistema',]);
        Permission::create(['name'=>'Plantienda Eliminar','slug'=>'plantienda.destroy','description'=>'Elimina el Plantienda del sistema',]);

        //Dashboard
        Permission::create(['name'=>'Dashboard Navegar','slug'=>'dashboard.index','description'=>'Lista todos los Dashboard del sistema',]);
        Permission::create(['name'=>'Dashboard Ver detalle','slug'=>'dashboard.show','description'=>'Ver en detalle cada Dashboard del sistema',]);
        Permission::create(['name'=>'Dashboard Crear','slug'=>'dashboard.create','description'=>'Crea un Dashboard en el sistema',]);
        Permission::create(['name'=>'Dashboard Editar','slug'=>'dashboard.edit','description'=>'Edita cada Dashboard del sistema',]);
        Permission::create(['name'=>'Dashboard Eliminar','slug'=>'dashboard.destroy','description'=>'Elimina el Dashboard del sistema',]);

        //Montador
        Permission::create(['name'=>'Montador Navegar','slug'=>'montador.index','description'=>'Lista todos los Montador del sistema',]);
        Permission::create(['name'=>'Montador Ver detalle','slug'=>'montador.show','description'=>'Ver en detalle cada Montador del sistema',]);
        Permission::create(['name'=>'Montador Crear','slug'=>'montador.create','description'=>'Crea un Montador en el sistema',]);
        Permission::create(['name'=>'Montador Editar','slug'=>'montador.edit','description'=>'Edita cada Montador del sistema',]);
        Permission::create(['name'=>'Montador Eliminar','slug'=>'montador.destroy','description'=>'Elimina el Montador del sistema',]);

        //SGH
        Permission::create(['name'=>'SGH Navegar','slug'=>'sgh.index','description'=>'Lista todos los SGH del sistema',]);
        Permission::create(['name'=>'SGH Ver detalle','slug'=>'sgh.show','description'=>'Ver en detalle cada SGH del sistema',]);
        Permission::create(['name'=>'SGH Crear','slug'=>'sgh.create','description'=>'Crea un SGH en el sistema',]);
        Permission::create(['name'=>'SGH Editar','slug'=>'sgh.edit','description'=>'Edita cada SGH del sistema',]);
        Permission::create(['name'=>'SGH Eliminar','slug'=>'sgh.destroy','description'=>'Elimina el SGH del sistema',]);


    }
}
