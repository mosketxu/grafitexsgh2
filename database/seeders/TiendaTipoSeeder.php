<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiendaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tienda_tipos')->delete();

        DB::table('tienda_tipos')->insert([
            ['id'=>'1','tiendatipo'=>'Grafitex'],
            ['id'=>'2',	'tiendatipo'=>'Skyn'],
            ['id'=>'3',	'tiendatipo'=>'Intermediate'],
            ['id'=>'4',	'tiendatipo'=>'Old Concept'],
            ['id'=>'5',	'tiendatipo'=>'Tiendas 4.0 4.5'],
            ['id'=>'6',	'tiendatipo'=>'Tiendas 4.0 4.6'],
            ['id'=>'7',	'tiendatipo'=>'Tiendas 4.0 4.7'],
            ['id'=>'8',	'tiendatipo'=>'Tiendas 4.0 4.8'],
            ['id'=>'9',	'tiendatipo'=>'Tiendas 4.0 4.9'],
            ['id'=>'10',	'tiendatipo'=>'Tiendas 4.0 4.10'],
            ['id'=>'11',	'tiendatipo'=>'Tiendas 4.0 4.11'],
            ['id'=>'12',	'tiendatipo'=>'Tiendas 4.0 4.12'],
            ['id'=>'13',	'tiendatipo'=>'Tiendas 4.0 4.13'],
            ['id'=>'14',	'tiendatipo'=>'Tiendas 4.0 4.14'],
            ['id'=>'15',	'tiendatipo'=>'Tiendas 4.0 4.15'],
            ['id'=>'16',	'tiendatipo'=>'Tiendas 4.0 4.16'],
            ['id'=>'17',	'tiendatipo'=>'Tiendas 4.0 4.17'],
            ['id'=>'18',	'tiendatipo'=>'Tiendas 4.0 4.18'],
            ['id'=>'19',	'tiendatipo'=>'Tiendas 4.0 4.19'],
            ['id'=>'20',	'tiendatipo'=>'Tiendas 4.0 4.20'],
            ['id'=>'21',	'tiendatipo'=>'Tiendas 4.0 4.21'],
            ['id'=>'22',	'tiendatipo'=>'Tiendas 4.0 4.22'],
            ['id'=>'23',	'tiendatipo'=>'Ray Ban'],
            ]);
    }
}
