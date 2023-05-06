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
        DB::connection('mysql_2')->statement("CREATE VIEW `company_country` AS select `admdb`.`company_country`.`company_id` AS `company_id`,`admdb`.`company_country`.`country_id` AS `country_id` from `admdb`.`company_country`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mysql_2')->statement("DROP VIEW IF EXISTS `company_country`");
    }
};
