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
        DB::connection('mysql_2')->statement("CREATE VIEW `time_dimension_company` AS select `admdb`.`time_dimension_company`.`id` AS `id`,`admdb`.`time_dimension_company`.`db_date` AS `db_date`,`admdb`.`time_dimension_company`.`year` AS `year`,`admdb`.`time_dimension_company`.`month` AS `month`,`admdb`.`time_dimension_company`.`day` AS `day`,`admdb`.`time_dimension_company`.`quarter` AS `quarter`,`admdb`.`time_dimension_company`.`week` AS `week`,`admdb`.`time_dimension_company`.`day_name` AS `day_name`,`admdb`.`time_dimension_company`.`month_name` AS `month_name`,`admdb`.`time_dimension_company`.`holiday_flag` AS `holiday_flag`,`admdb`.`time_dimension_company`.`weekend_flag` AS `weekend_flag`,`admdb`.`time_dimension_company`.`event` AS `event`,`admdb`.`time_dimension_company`.`company` AS `company`,`admdb`.`time_dimension_company`.`company_id` AS `company_id`,`admdb`.`time_dimension_company`.`hrdb_company_id` AS `hrdb_company_id` from `admdb`.`time_dimension_company`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mysql_2')->statement("DROP VIEW IF EXISTS `time_dimension_company`");
    }
};
