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
        DB::connection('mysql_2')->statement("CREATE VIEW `companies_bank_holidays` AS select `admdb`.`companies_bank_holidays`.`id` AS `id`,`admdb`.`companies_bank_holidays`.`company_id` AS `company_id`,`admdb`.`companies_bank_holidays`.`year` AS `year`,`admdb`.`companies_bank_holidays`.`bank_holiday_date` AS `bank_holiday_date`,`admdb`.`companies_bank_holidays`.`bank_holiday_name` AS `bank_holiday_name`,`admdb`.`companies_bank_holidays`.`bank_holiday_fix` AS `bank_holiday_fix`,`admdb`.`companies_bank_holidays`.`created_at` AS `created_at`,`admdb`.`companies_bank_holidays`.`updated_at` AS `updated_at` from `admdb`.`companies_bank_holidays`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mysql_2')->statement("DROP VIEW IF EXISTS `companies_bank_holidays`");
    }
};
