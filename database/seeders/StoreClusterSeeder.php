<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_clusters')->delete();

        DB::table('store_clusters')->insert([
            ['store_cluster'=>'Basic'],
            ['store_cluster'=>'ECI'],
            ['store_cluster'=>'INLINE'],
            ['store_cluster'=>'OPEN AIR'],
            ]);
        }
}
