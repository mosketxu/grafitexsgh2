<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EscaparateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escaparates')->delete();

        DB::table('escaparates')->insert([
            ['escaparate'=>'4370x3240','ancho'=>'4370','alto'=>'3240','area'=>'14.16'],
            ['escaparate'=>'4283x3240','ancho'=>'4283','alto'=>'3240','area'=>'13.88'],
            ['escaparate'=>'5800x3240','ancho'=>'5800','alto'=>'3240','area'=>'18.79'],
            ['escaparate'=>'1541x2311','ancho'=>'1541','alto'=>'2311','area'=>'3.56'],
            ['escaparate'=>'1602x2211','ancho'=>'1602','alto'=>'2211','area'=>'3.54'],
            ['escaparate'=>'3316x2253','ancho'=>'3316','alto'=>'2253','area'=>'7.47'],
            ['escaparate'=>'1582x2253','ancho'=>'1582','alto'=>'2253','area'=>'3.56'],
            ['escaparate'=>'3400x2170','ancho'=>'3400','alto'=>'2170','area'=>'7.38'],
            ['escaparate'=>'3374x2170','ancho'=>'3374','alto'=>'2170','area'=>'7.32'],
            ['escaparate'=>'3010x3366','ancho'=>'3010','alto'=>'3366','area'=>'10.13'],
            ['escaparate'=>'3016x3344','ancho'=>'3016','alto'=>'3344','area'=>'10.09'],
            ['escaparate'=>'3495x2400','ancho'=>'3495','alto'=>'2400','area'=>'8.39'],
            ['escaparate'=>'2280x3610','ancho'=>'2280','alto'=>'3610','area'=>'8.23'],
            ['escaparate'=>'930x2570','ancho'=>'930','alto'=>'2570','area'=>'2.39'],
            ['escaparate'=>'2210x2600','ancho'=>'2210','alto'=>'2600','area'=>'5.75'],
            ['escaparate'=>'4320x2630','ancho'=>'4320','alto'=>'2630','area'=>'11.36'],
            ['escaparate'=>'4330x2620','ancho'=>'4330','alto'=>'2620','area'=>'11.34'],
            ['escaparate'=>'2010x2620','ancho'=>'2010','alto'=>'2620','area'=>'5.27'],
            ['escaparate'=>'2380x2340','ancho'=>'2380','alto'=>'2340','area'=>'5.57'],
            ['escaparate'=>'2420x2750','ancho'=>'2420','alto'=>'2750','area'=>'6.66'],
            ['escaparate'=>'4250x2540','ancho'=>'4250','alto'=>'2540','area'=>'10.80'],
            ['escaparate'=>'6369x2750','ancho'=>'6369','alto'=>'2750','area'=>'17.51'],
            ['escaparate'=>'660x4150','ancho'=>'660','alto'=>'4150','area'=>'2.74'],
            ['escaparate'=>'1220x4030','ancho'=>'1220','alto'=>'4030','area'=>'4.92'],
            ['escaparate'=>'690x3860','ancho'=>'690','alto'=>'3860','area'=>'2.66'],
            ['escaparate'=>'2519x3623','ancho'=>'2519','alto'=>'3623','area'=>'9.13'],
            ['escaparate'=>'2525x3623','ancho'=>'2525','alto'=>'3623','area'=>'9.15'],
            ['escaparate'=>'3361x3623','ancho'=>'3361','alto'=>'3623','area'=>'12.18'],
            ['escaparate'=>'3354x3623','ancho'=>'3354','alto'=>'3623','area'=>'12.15'],
            ['escaparate'=>'3020x2550','ancho'=>'3020','alto'=>'2550','area'=>'7.70'],
            ['escaparate'=>'1450x2550','ancho'=>'1450','alto'=>'2550','area'=>'3.70'],
            ['escaparate'=>'720x2480','ancho'=>'720','alto'=>'2480','area'=>'1.79'],
            ['escaparate'=>'2367x3700','ancho'=>'2367','alto'=>'3700','area'=>'8.76'],
            ['escaparate'=>'2364x3700','ancho'=>'2364','alto'=>'3700','area'=>'8.75'],
            ['escaparate'=>'1750x1850','ancho'=>'1750','alto'=>'1850','area'=>'3.24'],
            ['escaparate'=>'1760x1850','ancho'=>'1760','alto'=>'1850','area'=>'3.26']
        ]);
    }
}



