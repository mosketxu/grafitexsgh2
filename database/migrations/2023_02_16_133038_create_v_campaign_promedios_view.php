<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVCampaignPromediosView extends Migration
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
            CREATE VIEW `v_campaign_promedios` AS select `campaign_tiendas`.`campaign_id` AS `campaign_id`,`campaign_elementos`.`zona` AS `zona`,`campaign_elementos`.`store_id` AS `store_id`,sum((`campaign_elementos`.`unitxprop` * `campaign_elementos`.`precio`)) AS `tot` from (`campaign_elementos` join `campaign_tiendas` on((`campaign_elementos`.`tienda_id` = `campaign_tiendas`.`id`))) group by `campaign_tiendas`.`campaign_id`,`campaign_elementos`.`store_id`,`campaign_elementos`.`zona`
        SQL;
    }

    private function dropView()
    {
        return <<<SQL
            DROP VIEW IF EXISTS `v_campaign_promedios`;
        SQL;
    }
}
