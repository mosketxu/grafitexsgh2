<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosRecepcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_recepcion')->delete();

        DB::table('estados_recepcion')->insert([
            ['id'=>'1','ok_ko'=>'ok','estado'=>'Correcto'],
            ['id'=>'2','ok_ko'=>'ko','estado'=>'No Recibido'],
            ['id'=>'3','ok_ko'=>'ko','estado'=>'Defectuoso'],
            ['id'=>'4','ok_ko'=>'ko','estado'=>'Idioma Incorrecto'],
            ['id'=>'5','ok_ko'=>'ko','estado'=>'Montaje Deficiente'],
            ]);
    }
}
