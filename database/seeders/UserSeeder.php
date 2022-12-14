<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Administrador','email' => 'admin@admin.com','password' => bcrypt('12345678'),
        ])->assignRole('admin');

        User::create(['name' => 'mosketxu','email' => 'mosketxu@gmail.com','password' => bcrypt('12345678'),
        ])->assignRole('admin');

        User::create(['name' => 'grafitex', 'email' => 'grafitex@grafitex.com','password'=>bcrypt('12345678'),
        ])->assignRole('grafitex');

        User::create(['name' => 'sgh','email' => 'sgh@sgh.com','password' => bcrypt('12345678'),
        ])->assignRole('sgh');

        User::create(['name' => 'proveedor','email' => 'proveedor@proveedor.com','password' => bcrypt('12345678'),
        ])->assignRole('proveedor');
    }
}
