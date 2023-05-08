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
        DB::statement("CREATE VIEW `job_grades` AS select `admdb`.`job_grades`.`id` AS `id`,`admdb`.`job_grades`.`job_grade_name` AS `job_grade_name`,`admdb`.`job_grades`.`job_grade` AS `job_grade`,`admdb`.`job_grades`.`job_level` AS `job_level`,`admdb`.`job_grades`.`amount` AS `amount`,`admdb`.`job_grades`.`created_at` AS `created_at`,`admdb`.`job_grades`.`updated_at` AS `updated_at` from `admdb`.`job_grades`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `job_grades`");
    }
};
