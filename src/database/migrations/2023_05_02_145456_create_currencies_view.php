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
        DB::statement("CREATE VIEW `currencies` AS select `admdb`.`currencies`.`id` AS `id`,`admdb`.`currencies`.`code` AS `code`,`admdb`.`currencies`.`description` AS `description`,`admdb`.`currencies`.`symbol` AS `symbol`,`admdb`.`currencies`.`country_id` AS `country_id`,`admdb`.`currencies`.`order_number` AS `order_number`,`admdb`.`currencies`.`decimal_digits` AS `decimal_digits`,`admdb`.`currencies`.`suite_id` AS `suite_id`,`admdb`.`currencies`.`created_at` AS `created_at`,`admdb`.`currencies`.`updated_at` AS `updated_at` from `admdb`.`currencies`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `currencies`");
    }
};
