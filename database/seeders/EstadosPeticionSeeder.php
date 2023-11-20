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
            ['id'=>'1','estadopeticion'=>'Pendiente Solicitud','validador'=>'todos'],
            ['id'=>'2','estadopeticion'=>'Solicitada','validador'=>'todos'],
            ['id'=>'3','estadopeticion'=>'Aceptada Central','validador'=>'sgh'],
            ['id'=>'4','estadopeticion'=>'Rechazada Central','validador'=>'sgh'],
            ['id'=>'5','estadopeticion'=>'Aceptada Grafitex','validador'=>'grafitex'],
            ['id'=>'6','estadopeticion'=>'Entregada Grafitex','validador'=>'grafitex'],
            ['id'=>'7','estadopeticion'=>'Recibida OK Tienda','validador'=>'tienda'],
            ['id'=>'8','estadopeticion'=>'Recibida KO Tienda','validador'=>'tienda'],
            ['id'=>'9','estadopeticion'=>'Finalizada','validador'=>'grafitex'],
         ]);
    }
}
