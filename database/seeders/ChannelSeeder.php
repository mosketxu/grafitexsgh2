<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->delete();

        DB::table('channels')->insert([
            ['channel'=>'Airport'],
            ['channel'=>'Dpt.Store'],
            ['channel'=>'Mall'],
            ['channel'=>'Outlet'],
            ['channel'=>'Street'],
            ]);
    }
}
