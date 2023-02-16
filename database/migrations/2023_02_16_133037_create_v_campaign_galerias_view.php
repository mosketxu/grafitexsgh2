<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVCampaignGaleriasView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }

    private function createView()
    {
        return <<<SQL
            CREATE VIEW `v_campaign_galerias` AS select `campaign_tiendas`.`campaign_id` AS `campaign_id`,`campaign_elementos`.`mobiliario` AS `mobiliario`,`campaign_elementos`.`carteleria` AS `carteleria`,`campaign_elementos`.`medida` AS `medida`,replace(replace(replace(replace(replace(replace(concat(`campaign_elementos`.`mobiliario`,`campaign_elementos`.`carteleria`,`campaign_elementos`.`medida`),' ',''),'.',''),'(',''),')',''),'+',''),'/','') AS `elemento`,if((left(`campaign_elementos`.`name`,3) = 'ECI'),'ECI','') AS `ECI`,concat(replace(replace(replace(replace(replace(replace(concat(`campaign_elementos`.`mobiliario`,`campaign_elementos`.`carteleria`,`campaign_elementos`.`medida`),' ',''),'.',''),'(',''),')',''),'+',''),'/',''),if((left(`campaign_elementos`.`name`,3) = 'ECI'),'ECI',''),'.jpg') AS `imagen` from (`campaign_elementos` join `campaign_tiendas` on((`campaign_elementos`.`tienda_id` = `campaign_tiendas`.`id`))) group by `campaign_tiendas`.`campaign_id`,`campaign_elementos`.`mobiliario`,`campaign_elementos`.`carteleria`,`campaign_elementos`.`medida`,replace(replace(replace(replace(replace(replace(concat(`campaign_elementos`.`mobiliario`,`campaign_elementos`.`carteleria`,`campaign_elementos`.`medida`),' ',''),'.',''),'(',''),')',''),'+',''),'/',''),if((left(`campaign_elementos`.`name`,3) = 'ECI'),'ECI',''),concat(replace(replace(replace(replace(replace(replace(concat(`campaign_elementos`.`mobiliario`,`campaign_elementos`.`carteleria`,`campaign_elementos`.`medida`),' ',''),'.',''),'(',''),')',''),'+',''),'/',''),if((left(`campaign_elementos`.`name`,3) = 'ECI'),'ECI',''),'.jpg')
        SQL;
    }

    private function dropView()
    {
        return <<<SQL
            DROP VIEW IF EXISTS `v_campaign_galerias`;
        SQL;
    }
}
