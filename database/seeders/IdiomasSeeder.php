<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class IdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('idiomas')->delete();

        DB::table('idiomas')->insert([
            ['id'=>'ES','idioma'=>'ES'],
            ['id'=>'PT','idioma'=>'PT'],
            ['id'=>'CAT','idioma'=>'CAT'],
            ]);
    }
}
