<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        User::create(['name' => 'Administrador','email' => 'admin@admin.com','password' => bcrypt('12345678'),
        ])->assignRole('admin');

        User::create(['name' => 'mosketxu','email' => 'mosketxu@gmail.com','password' => bcrypt('12345678'),
        ])->assignRole('admin');

        User::create(['name' => 'grafitex', 'email' => 'grafitex@grafitex.com','password'=>bcrypt('12345678'),
        ])->assignRole('grafitex');

        User::create(['name' => 'sgh','email' => 'sgh@sgh.com','password' => bcrypt('12345678'),
        ])->assignRole('sgh');

        User::create(['name' => 'montador','email' => 'montador@montador.com','password' => bcrypt('12345678'),
        ])->assignRole('montador');

        User::create(['name' => 'tienda','email' => 'tienda@tienda.com','password' => bcrypt('12345678'),
        ])->assignRole('tienda');

		// Role::create([
		// 	'name'=>'Admin',
		// 	'slug'=>'admin',
		// 	'special'=>'all-access'
		// ]);
    }
}
