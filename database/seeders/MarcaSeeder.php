<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->delete();

        DB::table('marcas')->insert([
            ['siglasmarca'=>'CH',	'marcaname'=>'Chanel'],
            ['siglamarca'=>'BC',	'marcaname'=>'Brunello Cucinelli'],
            ['siglamarca'=>'TF',	'marcaname'=>'Tiffany'],
            ['siglamarca'=>'BO',	'marcaname'=>'BOUCHERON'],
            ['siglamarca'=>'NC',	'marcaname'=>'BALMAIN'],
            ['siglamarca'=>'6JS',	'marcaname'=>'BOTTEGA VENETTA'],
            ['siglamarca'=>'CA',	'marcaname'=>'Cartier'],
            ['siglamarca'=>'PR',	'marcaname'=>'Prada'],
            ['siglamarca'=>'PRL',	'marcaname'=>'Prada Linea Rossa'],
            ['siglamarca'=>'MU',	'marcaname'=>'Miu Miu'],
            ['siglamarca'=>'JC',	'marcaname'=>'Jimmy Choo'],
            ['siglamarca'=>'VE',	'marcaname'=>'Versace'],
            ['siglamarca'=>'FHS',	'marcaname'=>'Ferrari Cavallino'],
            ['siglamarca'=>'OP',	'marcaname'=>'Oliver Peoples'],
            ['siglamarca'=>'DG',	'marcaname'=>'Dolce & Gabbana'],
            ['siglamarca'=>'RL',	'marcaname'=>'Ralph Lauren'],
            ['siglamarca'=>'AR',	'marcaname'=>'Giorgio Armani'],
            ['siglamarca'=>'BE',	'marcaname'=>'Burberry'],
            ['siglamarca'=>'PO',	'marcaname'=>'Persol'],
            ['siglamarca'=>'GG',	'marcaname'=>'Gucci'],
            ['siglamarca'=>'CD',	'marcaname'=>'Christian Dior'],
            ['siglamarca'=>'CDH',	'marcaname'=>'DHS DIOR HOMME SUN'],
            ['siglamarca'=>'YSL',	'marcaname'=>'Saint Lauren'],
            ['siglamarca'=>'CE',	'marcaname'=>'Celine'],
            ['siglamarca'=>'BA',	'marcaname'=>'Balenciaga'],
            ['siglamarca'=>'MO',	'marcaname'=>'Monclair'],
            ['siglamarca'=>'FT',	'marcaname'=>'Tom Ford'],
            ['siglamarca'=>'FE',	'marcaname'=>'Fendi'],
            ['siglamarca'=>'CL',	'marcaname'=>'Chloe'],
            ['siglamarca'=>'CP',	'marcaname'=>'Chopard'],
            ['siglamarca'=>'DT',	'marcaname'=>'Dita'],
            ['siglamarca'=>'TB',	'marcaname'=>'Tory Burch'],
            ['siglamarca'=>'SV',	'marcaname'=>'Svarowski'],
            ['siglamarca'=>'MK',	'marcaname'=>'Michael Kors'],
            ['siglamarca'=>'CO',	'marcaname'=>'Coach'],
            ['siglamarca'=>'RA',	'marcaname'=>'Ralph'],
            ['siglamarca'=>'PH',	'marcaname'=>'Polo Ralph Lauren'],
            ['siglamarca'=>'EA',	'marcaname'=>'Emporio Armani'],
            ['siglamarca'=>'VO',	'marcaname'=>'Vogue'],
            ['siglamarca'=>'FZS',	'marcaname'=>'Ferrari Scuderia'],
            ['siglamarca'=>'AN',	'marcaname'=>'Arnette'],
            ['siglamarca'=>'COS',	'marcaname'=>'Costa'],
            ['siglamarca'=>'OO',	'marcaname'=>'Oakley'],
            ['siglamarca'=>'RB',	'marcaname'=>'Ray-Ban']
        ]);
    }
}
