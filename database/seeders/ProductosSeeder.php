<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->delete();


        DB::table('productos')->insert([
        //     ['producto'=>'Base','tiendatipo_id'=>'1','descripcion'=>'Picking','precio'=>'20','activo'=>'1'],
            // ['producto'=>'EnvíoNacionalPenínsula','tiendatipo_id'=>'1','descripcion'=>'Envío Nacional Penínsulas','precio'=>'15','activo'=>'1'],
            // ['producto'=>'EnvíoCanarias','tiendatipo_id'=>'1','descripcion'=>'Envío Canarias','precio'=>'30','activo'=>'1'],
            // ['producto'=>'EnvíoPortugal','tiendatipo_id'=>'1','descripcion'=>'Envío Portugal','precio'=>'20','activo'=>'1'],
        //     ['producto'=>'RAY-BAN 389x140mm (area visible 389x125) vinilo TRANSPARENTE impresión en espejo','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'20','activo'=>'1'],
        //     ['producto'=>'OAKLEY 389x140mm (area visible 389x125) vinilo TRANSPARENTE impresión en espejo','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'20','activo'=>'1'],
        //     ['producto'=>'PRADA 389x140mm (area visible 389x125) vinilo TRANSPARENTE impersión en espejo','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'20','activo'=>'1'],
        //     ['producto'=>'PRL389x140mm (area visible 389x125) vinilo TRANSPARENTE impresión en espejo','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'20','activo'=>'1'],
        //     ['producto'=>'OAKLEY 330x340mm IMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'12','activo'=>'1'],
        //     ['producto'=>'NEW 171,45x32,5 mm IMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'POLAR 171,45x32,5 mmIMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'CHROMANCE 171,45x32,5 mm IMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'EXCLUSIVE 171,45x32,5 mm IMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'BEST SELLER 171,45x32,5 mm IMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'EVOLVE 171,45x32,5 mm IMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'BLUE LIGHT 171,45x32,5 mm IMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'LIMITED EDITION 171,45x32,5 mm IMAN','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'CRM 254X254 mm couché','tiendatipo_id'=>'2','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRADA 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Cartier 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Bulgari 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Tiffany 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'D&G 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Dior 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Giorgio Armani 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Persol 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Gucci 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Celine 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Chloé 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Tom Ford 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Versace 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Polo  30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Emporio Armani 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Michael Kors 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Ralph 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Vogue 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Arnette 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Costa 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Oakley 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'Ray-ban 30x30 iman','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'PERSOL 102x75 mm Couché. Logo fondo negro con letras blancas','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'GIORGIO ARMANI 102x75 mm Couché. Logo fondo negro con letras blancas','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'D&G102x75 mm Couché. Logo fondo negro con letras blancas','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'MIU MIU 165X51 mm Couché. Logo fondo negro con letras blancas','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL 165X51 mm Couché. Logo fondo negro con letras blancas','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'BURBERRY 152X71 mm couché. Logo fondo negro con letras blancas','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'POLO 152X71 mm couché. Logo fondo negro con letras blancas','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'SWAROVSKI 165X51 mm couché. Logo fondo negro con letras blancas','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'CRM 254X254 mm couché','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'FD REBAJAS Banner 1000x2100 mm lona','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'40','activo'=>'1'],
        //     ['producto'=>'FD COMPLETO Primavera  Banner 1000x2100 mm lona','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'40','activo'=>'1'],
        //     ['producto'=>'FD COMPLETO Verano   Banner 1000x2100 mm lona','tiendatipo_id'=>'3','descripcion'=>'','precio'=>'40','activo'=>'1'],
        //     ['producto'=>'PRADA  254X254 vinilo - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PERSOL 254X254 Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'AN 254X254 Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'OAKLEY 254X254 Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL 254X254 Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'D&G 254X254 Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'GUCCI 254X254 Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'TIFFANY 254X254 Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL 254X254 mm Vinilo - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRADA 254x254 mm Vinilo - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'OAKLEY 254x254 mm Vinilo - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'DOLCE&GABBANA 254x254 mm Vinilo - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'CHOPARD 300X300 Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'CHLOE 254X254 mm Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'TOM FORD 254X254 mm Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'RAY-BAN REVERSE 254X254 mm couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'MIU MIU 254x254 mm couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL 254x254 mm couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'BURBERRY 254x254 mm couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRADA 254x254 mm couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'GUCCI 254X254 mm Couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'BURBERRY 200x55mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'MIU MIU 200x55mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL200x55mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRADA 200x55mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'DITA 165x51 mm Couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRADA 165x51 mm Couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL 165x51 mm Couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'BURBERRY 165x51 mm Couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'MIU MIU 165x51 mm Couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'BURBERRY 152X71 mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'ARMANI EXCHANGE 152X71 mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRADA 152X71 mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL 152X71 mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'RAY-BAN 152X71 mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'RAY-BAN 150x70mm couhé - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'BURBERRY 150x70mm couhé - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'GUCCI 150x70mm couhé - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'SWAROVSKI 152x71mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'SWAROVSKI 165x55 mm couché - fondo negro con letras blancas','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>' PMS Kit táctico 30% segundo par  152x71mm Couché - Descuentos','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>' FD VERANO Banner 900x1905 mm Lona','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'40','activo'=>'1'],
        //     ['producto'=>' FD PRIMAVERA Banner 900x1905 mm Lona','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'40','activo'=>'1'],
        //     ['producto'=>'CRM 254X254 mm couché','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'SWAROVSKI 215X124 mm couché - Brand Images','tiendatipo_id'=>'23','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'D&G254x254 mm  vinilo - Brand Images','tiendatipo_id'=>'23','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'OLIVER PEOPLES 254X254 mm couché - Brand Images','tiendatipo_id'=>'23','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'MIU MIU 215x124mm couché - Brand Images','tiendatipo_id'=>'23','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL 254X254mm Vinilo  - Brand Images','tiendatipo_id'=>'23','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRADA 254x254 mm  couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'PRL 254x254 mm  couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'VERSACE 254x254 mm  couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'MK 254x254 mm  couché - Brand Images','tiendatipo_id'=>'4','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'SWAROVSKI 254x254 mm  couché - Brand Images','tiendatipo_id'=>'14','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'GUCCI  254x254 mm  couché - Brand Images','tiendatipo_id'=>'15','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'TOM FORD  254x254 mm  couché - Brand Images','tiendatipo_id'=>'16','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'GIORGIO ARMANI 254x254 mm  couché - Brand Images','tiendatipo_id'=>'17','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'RAY-BAN POLARIZED 348x348mm iman - Brand Images','tiendatipo_id'=>'18','descripcion'=>'','precio'=>'10','activo'=>'1'],
        //     ['producto'=>'SWAROVSKI 102X75 mm couché - Logos','tiendatipo_id'=>'19','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'FD Completo Primavera -Banner 900x1905 mm Lona','tiendatipo_id'=>'20','descripcion'=>'','precio'=>'40','activo'=>'1'],
        //     ['producto'=>'FD Completo Verano -Banner 900x1905 mm Lona','tiendatipo_id'=>'21','descripcion'=>'','precio'=>'40','activo'=>'1'],
        //     ['producto'=>'CRM 254X254 mm couché','tiendatipo_id'=>'22','descripcion'=>'','precio'=>'5','activo'=>'1'],
        //     ['producto'=>'CRM 254X254 mm couché','tiendatipo_id'=>'23','descripcion'=>'','precio'=>'5','activo'=>'1'],
        ]);
    }
    }
