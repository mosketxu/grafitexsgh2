<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->delete();

        DB::table('stores')->insert([
            ['id'=>'2389','country'=>'PT','name'=>'Aeroporto Lisboa AIRSIDE','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2392','country'=>'PT','name'=>'Algarve Planta Alta ','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2414','country'=>'ES','name'=>'ECI La Vaguada','area'=>'Madrid ','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2420','country'=>'ES','name'=>'Oasis','area'=>'Canarias','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2421','country'=>'ES','name'=>'Habaneras ','area'=>'Levante','segmento'=>'Gold','concepto'=>'Intermediate + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2422','country'=>'ES','name'=>'Espai Girona','area'=>'Cataluña','segmento'=>'Gold','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2423','country'=>'ES','name'=>'Las Terrazas','area'=>'Canarias','segmento'=>'Outlet','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2428','country'=>'ES','name'=>'Aqua','area'=>'Levante ','segmento'=>'Silver','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2430','country'=>'ES','name'=>'Vialia','area'=>'Andalucía','segmento'=>'Silver','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2431','country'=>'ES','name'=>"L'Aljub",'area'=>'Levante','segmento'=>'Silver','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2435','country'=>'ES','name'=>'Fañabe','area'=>'Canarias','segmento'=>'Gold','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2439','country'=>'ES','name'=>'Area Sur ','area'=>'Andalucía','segmento'=>'Outlet','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2442','country'=>'ES','name'=>'Portal de la Marina','area'=>'Levante','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2443','country'=>'ES','name'=>'El Campanario','area'=>'Canarias','segmento'=>'Gold','concepto'=>'Basic','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2451','country'=>'ES','name'=>'Getafe','area'=>'Madrid','segmento'=>'Outlet','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2452','country'=>'ES','name'=>'Outletuy','area'=>'Madrid','segmento'=>'Outlet','concepto'=>'2.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2454','country'=>'ES','name'=>'Puerto Banús','area'=>'Andalucía','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2455','country'=>'ES','name'=>'La Cañada','area'=>'Andalucía','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2461','country'=>'ES','name'=>'Plaza del Duque','area'=>'Canarias','segmento'=>'Silver','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2462','country'=>'ES','name'=>'Las Palmeras','area'=>'Canarias','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2463','country'=>'ES','name'=>'Mirador de Jinamar','area'=>'Canarias','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2464','country'=>'ES','name'=>'Bahía Sur','area'=>'Andalucía','segmento'=>'Silver','concepto'=>'Intermediate + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2465','country'=>'ES','name'=>'Luz Shopping','area'=>'Andalucía','segmento'=>'Outlet','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2466','country'=>'ES','name'=>'Rambla de Cataluña','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'6000 + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2470','country'=>'ES','name'=>'La Maquinista','area'=>'Cataluña','segmento'=>'Silver','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2472','country'=>'ES','name'=>'Mataró','area'=>'Cataluña','segmento'=>'Gold','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2474','country'=>'ES','name'=>'La Rinconada','area'=>'Andalucía','segmento'=>'Outlet','concepto'=>'Intermediate + 4.0 + RB SIS + Promo Table','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2476','country'=>'ES','name'=>'Plaza Mayor','area'=>'Andalucía','segmento'=>'Gold','concepto'=>'Intermediate + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2477','country'=>'ES','name'=>'Diagonal Mar ','area'=>'Cataluña','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2478','country'=>'ES','name'=>'Las Rozas','area'=>'Madrid','segmento'=>'Outlet','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2479','country'=>'PT','name'=>'Factory Bonaire ','area'=>'Levante','segmento'=>'Outlet','concepto'=>'Intermediate + RB SIS + Promo Table','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2481','country'=>'ES','name'=>'Artea','area'=>'Norte','segmento'=>'Silver','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2482','country'=>'ES','name'=>'La Morea','area'=>'Norte','segmento'=>'Gold','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2485','country'=>'ES','name'=>'Licenciado Pozas ','area'=>'Norte','segmento'=>'Gold','concepto'=>'6000 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2489','country'=>'ES','name'=>'Parque Principado','area'=>'Madrid','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2492','country'=>'ES','name'=>'Mirador ','area'=>'Canarias','segmento'=>'Platinum','concepto'=>'2.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2493','country'=>'ES','name'=>'Fuencarral ','area'=>'Madrid','segmento'=>'Platinum','concepto'=>'6000 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2494','country'=>'ES','name'=>'Santa Cruz','area'=>'Canarias','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2495','country'=>'ES','name'=>'Dos Mares','area'=>'Levante','segmento'=>'Gold','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2496','country'=>'ES','name'=>'Baricentro ','area'=>'Cataluña','segmento'=>'Silver','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2497','country'=>'ES','name'=>'Dos Hermanas','area'=>'Andalucía','segmento'=>'Outlet','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2499','country'=>'ES','name'=>'Valle Real','area'=>'Norte','segmento'=>'Silver','concepto'=>'2.0 Open Air','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2507','country'=>'PT','name'=>'Dolce Vita Tejo Loja ','area'=>'Portugal 2','segmento'=>'Silver','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2508','country'=>'PT','name'=>'Colombo','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS + Promo table','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2509','country'=>'PT','name'=>'Almada Forum ','area'=>'Portugal 1','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2517','country'=>'PT','name'=>'Norte Shopping','area'=>'Portugal 1','segmento'=>'Platinum','concepto'=>'3.0 + ZIGZAG (RB-OO)','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2519','country'=>'PT','name'=>'Vasco Da Gama','area'=>'Portugal 1','segmento'=>'Platinum','concepto'=>'3.0 + ZIGZAG (RB-OO)','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2521','country'=>'PT','name'=>'Braga Parque ','area'=>'Portugal 1','segmento'=>'Gold','concepto'=>'Intermediate + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2532','country'=>'PT','name'=>'Cascais Shopping','area'=>'Portugal 1','segmento'=>'Platinum','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2534','country'=>'PT','name'=>'Aeroporto Porto','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2536','country'=>'PT','name'=>'Armazéns Chiado','area'=>'Portugal 1','segmento'=>'Gold','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2539','country'=>'PT','name'=>'Campera Outlet ','area'=>'Portugal 1','segmento'=>'Outlet','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2541','country'=>'PT','name'=>'Foz Plaza ','area'=>'Portugal 2','segmento'=>'Silver','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2545','country'=>'PT','name'=>'Forum Montijo','area'=>'Portugal 1','segmento'=>'Silver','concepto'=>'2.0 Open Air','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2546','country'=>'PT','name'=>'Acores','area'=>'Portugal 2','segmento'=>'Silver','concepto'=>'2.0 Open Air','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2547','country'=>'PT','name'=>'Outlet Freeport ','area'=>'Portugal 1','segmento'=>'Outlet','concepto'=>'2.0 + RB SIS + Promo Table','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2548','country'=>'PT','name'=>'Dolce Vita Douro','area'=>'Portugal 2','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2549','country'=>'PT','name'=>'Vila Do Conde','area'=>'Portugal 1','segmento'=>'Outlet','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2550','country'=>'PT','name'=>'Alma Shopping (Dolce Vita Coimbra)','area'=>'Portugal 2','segmento'=>'Gold','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2552','country'=>'PT','name'=>'Alameda (Dolce Vita Antas)','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2554','country'=>'PT','name'=>'Forum  Coimbra ','area'=>'Portugal 2','segmento'=>'Gold','concepto'=>'Intermediate + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2556','country'=>'PT','name'=>'Arrabida Shopping ','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2574','country'=>'PT','name'=>'Via Catarina','area'=>'Portugal 2','segmento'=>'Gold','concepto'=>'Intermediate','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2575','country'=>'PT','name'=>'Mar Shopping','area'=>'Portugal 1','segmento'=>'Silver','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2577','country'=>'PT','name'=>'Estacao Viana do Castelo ','area'=>'Portugal 1','segmento'=>'Silver','concepto'=>'3.0 + ZIGZAG (RB-OO)','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2718','country'=>'ES','name'=>'Dehesa Vieja','area'=>'Madrid','segmento'=>'Outlet','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2720','country'=>'PT','name'=>'Aeroporto Lisboa (LX)','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'6000 + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2771','country'=>'ES','name'=>'ECI 3 de Mayo','area'=>'Canarias','segmento'=>'Platinum','concepto'=>'SIS 6000 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2772','country'=>'ES','name'=>'ECI Diagonal','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2773','country'=>'ES','name'=>'ECI Mesa y Lopez','area'=>'Canarias','segmento'=>'Platinum','concepto'=>'SIS 6000 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2774','country'=>'ES','name'=>'ECI 7 Palmas','area'=>'Canarias','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2784','country'=>'ES','name'=>'Sitges','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'6000 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2866','country'=>'ES','name'=>'Ricardo Soriano','area'=>'Andalucía','segmento'=>'Gold','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2967','country'=>'ES','name'=>'Aeropuerto BCN T1 Airside','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'3.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2998','country'=>'ES','name'=>"L'illa",'area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'2999','country'=>'ES','name'=>'Maremagnum','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3011','country'=>'ES','name'=>'Aeropuerto Alicante ','area'=>'Levante ','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3012','country'=>'ES','name'=>'Aeropuerto Málaga Airside ','area'=>'Andalucía','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS + Promo table','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3060','country'=>'PT','name'=>'Dolce Vita Funchal','area'=>'Portugal 1','segmento'=>'Silver','concepto'=>'2.0 Open Air','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3064','country'=>'ES','name'=>'Jaume III','area'=>'Baleares','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3079','country'=>'ES','name'=>'Aeropuerto Fuerteventura ','area'=>'Canarias','segmento'=>'Platinum','concepto'=>'2.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3093','country'=>'ES','name'=>'Aeropuerto Gran Canaria','area'=>'Canarias','segmento'=>'Gold','concepto'=>'2.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3098','country'=>'ES','name'=>'Aeropuerto Ibiza ','area'=>'Baleares','segmento'=>'Platinum','concepto'=>'2.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3102','country'=>'ES','name'=>'Aeropuerto Lanzarote','area'=>'Canarias','segmento'=>'Gold','concepto'=>'2.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3103','country'=>'ES','name'=>'Aeropuerto Málaga Landside','area'=>'Andalucía','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3117','country'=>'ES','name'=>'Aeropuerto Mahón Menorca ','area'=>'Baleares','segmento'=>'Platinum','concepto'=>'2.0 + 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3135','country'=>'ES','name'=>'Siam Mall','area'=>'Canarias','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3140','country'=>'ES','name'=>'San Sebastian','area'=>'Norte','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3141','country'=>'ES','name'=>'Aeropuerto Tenerife Norte ','area'=>'Canarias','segmento'=>'Gold','concepto'=>'6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3142','country'=>'ES','name'=>'Aeropuerto Tenerife Sur ','area'=>'Canarias','segmento'=>'Gold','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3176','country'=>'PT','name'=>'8 Avenida','area'=>'Portugal 3','segmento'=>'Silver','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3177','country'=>'PT','name'=>'Amoreiras','area'=>'Portugal 1','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3182','country'=>'PT','name'=>'Madeira Shopping','area'=>'Portugal 1','segmento'=>'Gold','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3235','country'=>'ES','name'=>'ECI Campo de las Naciones','area'=>'Madrid','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3258','country'=>'ES','name'=>'Larios','area'=>'Andalucía','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3575','country'=>'ES','name'=>'Factory Outlet Viladecans','area'=>'Cataluña','segmento'=>'Outlet','concepto'=>'2.0 + RB SIS + Promo Table','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3768','country'=>'ES','name'=>'Cordoba / Gondomar','area'=>'Andalucía','segmento'=>'Silver','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3774','country'=>'ES','name'=>'Aeropuerto Palma de Mallorca Mod D','area'=>'Baleares','segmento'=>'Platinum','concepto'=>'2.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3775','country'=>'ES','name'=>'Mallorca Fashion Outlet (Festival Park) ','area'=>'Baleares','segmento'=>'Outlet','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3778','country'=>'ES','name'=>'Bilbao Gran Vía','area'=>'Norte','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3907','country'=>'ES','name'=>'Las Rozas Village ','area'=>'Madrid','segmento'=>'Outlet','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3908','country'=>'ES','name'=>'Gran Jonquera','area'=>'Cataluña','segmento'=>'Outlet','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'3914','country'=>'ES','name'=>'Aeropuerto Madrid T4 LS','area'=>'Madrid ','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'4193','country'=>'ES','name'=>'Aeropuerto Palma de Mallorca Mod A ','area'=>'Baleares','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS + Promo Table','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'4243','country'=>'ES','name'=>'Serrano','area'=>'Madrid','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'4290','country'=>'ES','name'=>'ECI Princesa','area'=>'Madrid','segmento'=>'Gold ','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'4298','country'=>'ES','name'=>'ECI Vigo','area'=>'Madrid','segmento'=>'Gold','concepto'=>'SIS 6000 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'4477','country'=>'PT','name'=>'Rua Augusta','area'=>'Portugal 1','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'4490','country'=>'ES','name'=>'Portaferrissa','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5031','country'=>'ES','name'=>'Recogidas','area'=>'Andalucía','segmento'=>'Gold','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5103','country'=>'ES','name'=>'Porto Pi','area'=>'Baleares','segmento'=>'Gold','concepto'=>'2.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5222','country'=>'PT','name'=>'Aeroporto Funchal','area'=>'Portugal 1','segmento'=>'Platinum','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5272','country'=>'PT','name'=>'Leiria','area'=>'Portugal 2','segmento'=>'Gold','concepto'=>'2.0 Open Air','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5329','country'=>'ES','name'=>'ECI Independencia ','area'=>'Madrid','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5364','country'=>'ES','name'=>'ECI Cornellá','area'=>'Cataluña','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5370','country'=>'ES','name'=>'ECI Badajoz Centro','area'=>'Madrid','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5396','country'=>'ES','name'=>'Aero Girona ','area'=>'Cataluña','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5466','country'=>'ES','name'=>'ECI Tarragona','area'=>'Cataluña','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5527','country'=>'ES','name'=>'ECI Valladolid','area'=>'Madrid','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5553','country'=>'ES','name'=>'ECI Puerto Banús','area'=>'Andalucía','segmento'=>'Platinum','concepto'=>'SIS 6000 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5554','country'=>'ES','name'=>'ECI Bahía de Cádiz','area'=>'Andalucía','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5620','country'=>'ES','name'=>'Juan de Austria','area'=>'Levante','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'5650','country'=>'ES','name'=>'Málaga- Calle Granada','area'=>'Andalucía','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'6541','country'=>'ES','name'=>'Portal del Angel (Flasghip)','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'Flagship + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'7035','country'=>'ES','name'=>'ECI Preciados','area'=>'Madrid','segmento'=>'Platinum','concepto'=>'SIS 2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'7037','country'=>'ES','name'=>'ECI Palma de Mallorca','area'=>'Baleares','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'7039','country'=>'ES','name'=>'ECI Arabial','area'=>'Andalucía','segmento'=>'Gold','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'7044','country'=>'ES','name'=>'ECI Marineda','area'=>'Madrid ','segmento'=>'Silver','concepto'=>'SIS 6000','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'7065','country'=>'ES','name'=>'Aeropuerto Madrid T4 AS ','area'=>'Madrid ','segmento'=>'Platinum','concepto'=>'2.0 + 6000 +RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'7068','country'=>'ES','name'=>'Calle Gambo','area'=>'Levante','segmento'=>'Platinum','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'7069','country'=>'ES','name'=>'Las Arenas BCN ','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'2.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'7700','country'=>'PT','name'=>'C.C. Nova Arcada','area'=>'Portugal 1','segmento'=>'Gold','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8593','country'=>'ES','name'=>'Logroño','area'=>'Norte','segmento'=>'Gold','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8596','country'=>'ES','name'=>'Jerez de la Frontera (Lancería)','area'=>'Andalucía','segmento'=>'Silver','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8597','country'=>'ES','name'=>'Columela ','area'=>'Andalucía','segmento'=>'Gold','concepto'=>'2.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8603','country'=>'ES','name'=>'Pamplona','area'=>'Norte','segmento'=>'Gold','concepto'=>'2.0 + ZIGZAG (RB-OO)','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8606','country'=>'ES','name'=>'Santander','area'=>'Norte','segmento'=>'Gold','concepto'=>'2.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8608','country'=>'ES','name'=>'Mahón ','area'=>'Baleares','segmento'=>'Gold','concepto'=>'2.0 ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8609','country'=>'ES','name'=>'Aeropuerto Palma de Mallorca Mod C','area'=>'Baleares','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8777','country'=>'PT','name'=>'Aeroporto Faro (Loja)','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'3.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8778','country'=>'PT','name'=>'Aeroporto Faro Kiosko','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'3.0 Special','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8779','country'=>'PT','name'=>'Aeroporto Lisboa T2','area'=>'Portugal 2','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8910','country'=>'ES','name'=>'Aeropuerto Madrid T2','area'=>'Madrid','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'8993','country'=>'ES','name'=>'Aeropuerto MAD T3','area'=>'Madrid ','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9060','country'=>'ES ','name'=>'Tetuan','area'=>'Andalucía','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9081','country'=>'ES','name'=>'Barakaldo Fashion Outlet','area'=>'Norte','segmento'=>'Outlet','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9082','country'=>'ES','name'=>'Coruña The Style Outlet','area'=>'Madrid','segmento'=>'Outlet','concepto'=>'Intermediate ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9128','country'=>'ES','name'=>'Gandía','area'=>'Levante','segmento'=>'Silver','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9137','country'=>'ES','name'=>'Murcia Gran Vía','area'=>'Levante','segmento'=>'Gold','concepto'=>'Intermediate + RB SIS + 4.0','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9140','country'=>'PT','name'=>'Rua do Carmo ','area'=>'Portugal 1','segmento'=>'Platinum','concepto'=>'3.0 + ZIGZAG (RB-OO)','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9141','country'=>'ES','name'=>'Aeropuerto Bilbao','area'=>'Norte','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9142','country'=>'ES','name'=>'Jaume II','area'=>'Baleares','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9159','country'=>'ES','name'=>'Plaza Sant Jaume','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'3.0 + ZIGZAG (RB-OO)','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9160','country'=>'ES','name'=>'El Muelle','area'=>'Canarias','segmento'=>'Silver','concepto'=>'3.0 + ZIGZAG (RB-OO)','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9166','country'=>'ES','name'=>'Aeropuerto Valencia','area'=>'Levante','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9167','country'=>'ES','name'=>'Aeropuerto Santiago','area'=>'Norte','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9192','country'=>'ES','name'=>'Aeropuerto BCN T1 No Schengen','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9193','country'=>'PT','name'=>'Algarve Outlet Inter Ikea','area'=>'Portugal 2','segmento'=>'Outlet','concepto'=>'3.0 + ZIGZAG (RB-OO)','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9194','country'=>'PT','name'=>'Povoa','area'=>'Portugal 1','segmento'=>'Gold','concepto'=>'3.0 + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9195','country'=>'ES','name'=>'Algeciras','area'=>'Andalucía','segmento'=>'Gold','concepto'=>'3.0 + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9206','country'=>'ES','name'=>'Denia','area'=>'Levante','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9276','country'=>'PT','name'=>'Strada Outlet','area'=>'Portugal 2','segmento'=>'Outlet','concepto'=>'SGH-NXT + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9281','country'=>'ES','name'=>'Outlet alicante','area'=>'Levante','segmento'=>'Outlet','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9328','country'=>'ES','name'=>'Puigcerdá','area'=>'Cataluña','segmento'=>'Gold','concepto'=>'3.0 + RB SIS ','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9331','country'=>'PT','name'=>'Oeiras','area'=>'Portugal','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9347','country'=>'ES','name'=>'La Roca Village ','area'=>'Cataluña','segmento'=>'Outlet','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9348','country'=>'ES','name'=>'Aero BCN T1 Airside Schengen (exAristocrazy)','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'3.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9530','country'=>'ES','name'=>'Finestrelles','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
            ['id'=>'9999','country'=>'ES','name'=>'ECI Diagonal','area'=>'Cataluña','segmento'=>'Platinum','concepto'=>'4.0 + RB SIS','zona'=>'ES','area_id'=>'1','concepto_id'=>'1'],
                    ]);
    }
}
