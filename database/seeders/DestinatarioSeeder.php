<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinatarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destinatarios')->delete();

        DB::table('destinatarios')->insert([
            ['id'=>'1','name'=>'Mosketxu','mail'=>'mosketxu@gmail.com','empresa'=>'Grafitex'],
            ['id'=>'2','name'=>'Alex Hotmai','mail'=>'alex.arregui@hotmail.es','empresa'=>'Grafitex'],
            ['id'=>'3','name'=>'Alex Rur','mail'=>'alex.arregui@rursistema.com','empresa'=>'SGH'],
            ['id'=>'4','name'=>'Alex Suma','mail'=>'alex.arregui@sumaempresa.com','empresa'=>'SHG'],
         ]);
    }
}
