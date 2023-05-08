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
        DB::statement("CREATE VIEW `companies` AS select `admdb`.`companies`.`id` AS `id`,`admdb`.`companies`.`company` AS `company`,`admdb`.`companies`.`order_number` AS `order_number`,`admdb`.`companies`.`company_name` AS `company_name`,`admdb`.`companies`.`invoice_prefix` AS `invoice_prefix`,`admdb`.`companies`.`project_prefix` AS `project_prefix`,`admdb`.`companies`.`currency_id` AS `currency_id`,`admdb`.`companies`.`legal_working_hours` AS `legal_working_hours`,`admdb`.`companies`.`week_working_string` AS `week_working_string`,`admdb`.`companies`.`monthly_instalments` AS `monthly_instalments`,`admdb`.`companies`.`reimb_km` AS `reimb_km`,`admdb`.`companies`.`suite_id` AS `suite_id`,`admdb`.`companies`.`team_id` AS `team_id`,`admdb`.`companies`.`created_at` AS `created_at`,`admdb`.`companies`.`updated_at` AS `updated_at` from `admdb`.`companies`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `companies`");
    }
};
