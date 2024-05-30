<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto_categorias')->delete();


        DB::table('producto_categorias')->insert([
            ['id'=>'1','productocategoria'=>'Brand Images'],
            ['id'=>'2','productocategoria'=>'Logos'],
            ['id'=>'3','productocategoria'=>'Varios'],
            ['id'=>'4','productocategoria'=>'Borrar'],
        ]);
    }
}
