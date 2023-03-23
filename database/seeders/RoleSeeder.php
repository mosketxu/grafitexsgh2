<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        $role1=Role::create(['name'=>'admin']);
        $role2=Role::create(['name'=>'grafitex']);
        $role3=Role::create(['name'=>'sgh']);
        $role4=Role::create(['name'=>'tienda']);
        $role5=Role::create(['name'=>'montador']);
    }
}
