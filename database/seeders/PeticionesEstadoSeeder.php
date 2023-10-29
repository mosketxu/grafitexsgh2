<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeticionesEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peticiones_estado')->delete();

        DB::table('peticiones_estado')->insert([
            ['id'=>'1','peticionestado'=>'Solicitada'],
            ['id'=>'2','peticionestado'=>'Aceptada'],
            ['id'=>'3','peticionestado'=>'Rechazada'],
            ['id'=>'4','peticionestado'=>'Finalizada'],
         ]);
    }
}
