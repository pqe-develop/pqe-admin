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
        DB::statement("CREATE VIEW `countries` AS select `admdb`.`countries`.`id` AS `id`,`admdb`.`countries`.`name` AS `name`,`admdb`.`countries`.`short_code` AS `short_code`,`admdb`.`countries`.`region` AS `region`,`admdb`.`countries`.`country_kpi` AS `country_kpi`,`admdb`.`countries`.`created_at` AS `created_at`,`admdb`.`countries`.`updated_at` AS `updated_at` from `admdb`.`countries`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `countries`");
    }
};
