<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SegmentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('segmentos')->delete();

        DB::table('segmentos')->insert([
            ['segmento'=>'Gold'],
            ['segmento'=>'Outlet'],
            ['segmento'=>'Platinum'],
            ['segmento'=>'Silver'],
            ]);
        }
    }
