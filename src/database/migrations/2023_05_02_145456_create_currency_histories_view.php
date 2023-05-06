<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('mysql_2')->statement("CREATE VIEW `currency_histories` AS select `admdb`.`currency_histories`.`id` AS `id`,`admdb`.`currency_histories`.`currency_id` AS `currency_id`,`admdb`.`currency_histories`.`date_validity` AS `date_validity`,`admdb`.`currency_histories`.`conversion_rate` AS `conversion_rate`,`admdb`.`currency_histories`.`created_at` AS `created_at`,`admdb`.`currency_histories`.`updated_at` AS `updated_at` from `admdb`.`currency_histories`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mysql_2')->statement("DROP VIEW IF EXISTS `currency_histories`");
    }
};
