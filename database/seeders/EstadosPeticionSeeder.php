<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosPeticionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_peticion')->delete();

        DB::table('estados_peticion')->insert([
            ['id'=>'1','estadopeticion'=>'Pendiente Solicitar'],
            ['id'=>'2','estadopeticion'=>'Solicitada'],
            ['id'=>'3','estadopeticion'=>'Aceptada'],
            ['id'=>'4','estadopeticion'=>'Rechazada'],
            ['id'=>'5','estadopeticion'=>'Finalizada'],
         ]);
    }
}
