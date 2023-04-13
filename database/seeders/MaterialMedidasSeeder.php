<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class MaterialMedidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tarifa_familias')->delete();

        DB::table('tarifa_familias')->insert([
            ['tarifa_id'=>1,'material'=>'Backlite','medida'=>'178x178 mm'],
            ['tarifa_id'=>1,'material'=>'Backlite','medida'=>'361x842 mm'],
            ['tarifa_id'=>1,'material'=>'Backlite','medida'=>'387x387 mm'],
            ['tarifa_id'=>1,'material'=>'Backlite','medida'=>'395x545 mm'],
            ['tarifa_id'=>1,'material'=>'Backlite','medida'=>'395x895 mm'],
            ['tarifa_id'=>1,'material'=>'Backlite','medida'=>'info no necesaria'],
            ['tarifa_id'=>1,'material'=>'Corporate','medida'=>'corporate'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'-'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'102x75 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'1376x392 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'1381x392 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'152x71 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'165x51 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'178x178 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'193x44 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'195x44 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'200x30 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'200x55 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'215x124 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'251x124 mm(visible 200x114 mm)'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'254x254 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'254x37 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'292x1163 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'343x795 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'343x795 mm(visible 320x772)'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'359x359 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'361x842 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'364x480mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'375x178 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'387x387 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'387x44 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'390x86mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'394x820 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'394x972 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'406x63 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'410x124 mm(visible 398x114 mm)'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'460x1360 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'500x1210 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'557x358 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'591x682(visible 570x661)'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'670x1650 mm'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'info no necesaria'],
            ['tarifa_id'=>1,'material'=>'Couché','medida'=>'sin info'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'1250x3270 mm'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'1450x1970 mm'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'1458x2300mm'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'1500x3260 mm'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'1770x2820 mm'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'3050x2600 mm'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'3870x3260 mm'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'3880x2940 mm'],
            ['tarifa_id'=>1,'material'=>'Cristal','medida'=>'sin info'],
            ['tarifa_id'=>1,'material'=>'Foam','medida'=>'-'],
            ['tarifa_id'=>1,'material'=>'Foam','medida'=>'650x1120 mm'],
            ['tarifa_id'=>1,'material'=>'Foam (cubrir los cantos + cinta doble cara)','medida'=>'610x2600 mm'],
            ['tarifa_id'=>1,'material'=>'Glasspack','medida'=>'1008x393 mm'],
            ['tarifa_id'=>1,'material'=>'Glasspack','medida'=>'1376x392 mm'],
            ['tarifa_id'=>1,'material'=>'Glasspack','medida'=>'1381x392 mm'],
            ['tarifa_id'=>1,'material'=>'Glasspack','medida'=>'195x44 mm'],
            ['tarifa_id'=>1,'material'=>'Glasspack','medida'=>'387x44 mm'],
            ['tarifa_id'=>1,'material'=>'Glasspack','medida'=>'406x63 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'162x72 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'164x75 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'167x60 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'180x88 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'184x82 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'195x48 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'195x80 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'230x48 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'253x176 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'254x254 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'280x710 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'300x300 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'313x313 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'348x348 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'348x542 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'352x572 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'352x766 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'352x960 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'359x359 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'376x377 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'376x402 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'424 x 600 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'424 x 600 mm / 848x600 mm'],
            ['tarifa_id'=>1,'material'=>'Imán','medida'=>'542x352 mm'],
            ['tarifa_id'=>1,'material'=>'info no necesaria','medida'=>'info no necesaria'],
            ['tarifa_id'=>1,'material'=>'Lona','medida'=>'1000x2100 mm'],
            ['tarifa_id'=>1,'material'=>'Lona','medida'=>'1250x2000 mm'],
            ['tarifa_id'=>1,'material'=>'Lona','medida'=>'914X2134 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'430x1800 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'435x725 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'505x1800 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'577x1800 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'635x1800 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'725x435 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'750x1900 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'760x1699 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'770x2530 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'835x835x835x1800 mm'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral','medida'=>'TBC'],
            ['tarifa_id'=>1,'material'=>'Lona con goma perimetral es una lona angular','medida'=>'1000x1000x2000 mm'],
            ['tarifa_id'=>1,'material'=>'mat 1','medida'=>'medida 1'],
            ['tarifa_id'=>1,'material'=>'Metacrilato','medida'=>'x'],
            ['tarifa_id'=>1,'material'=>'Papel','medida'=>'180x275 mm'],
            ['tarifa_id'=>1,'material'=>'Pet','medida'=>'1008x393 mm'],
            ['tarifa_id'=>1,'material'=>'Pet','medida'=>'1376x392 mm'],
            ['tarifa_id'=>1,'material'=>'Pet','medida'=>'1381x392 mm'],
            ['tarifa_id'=>1,'material'=>'Pet','medida'=>'178x178 mm'],
            ['tarifa_id'=>1,'material'=>'Pet','medida'=>'375x178 mm'],
            ['tarifa_id'=>1,'material'=>'Pet','medida'=>'387x387 mm'],
            ['tarifa_id'=>1,'material'=>'PVC','medida'=>'189x45 mm'],
            ['tarifa_id'=>1,'material'=>'PVC','medida'=>'190x45 mm'],
            ['tarifa_id'=>1,'material'=>'sin info','medida'=>'1630x2750 mm'],
            ['tarifa_id'=>1,'material'=>'sin info','medida'=>'1760x1860 mm'],
            ['tarifa_id'=>1,'material'=>'sin info','medida'=>'390x86mm'],
            ['tarifa_id'=>1,'material'=>'sin info','medida'=>'info no necesaria'],
            ['tarifa_id'=>1,'material'=>'Tela','medida'=>'915x2014mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo','medida'=>'1000x396 mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo','medida'=>'1000x752 mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo','medida'=>'1200x480 mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo','medida'=>'255x795 mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo','medida'=>'400X400 mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo','medida'=>'477x1425 mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo','medida'=>'500x214.54 mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo','medida'=>'info no necesaria'],
            ['tarifa_id'=>1,'material'=>'Vinilo de corte','medida'=>'1000x396 mm'],
            ['tarifa_id'=>1,'material'=>'Vinilo de corte','medida'=>'1200x480 mm'],
            ]);
        }
    }
