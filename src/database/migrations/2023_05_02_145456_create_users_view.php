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
		// drop table users if exists
		Schema::dropIfExists('users');

        DB::statement("CREATE VIEW `users` AS select `admdb`.`users`.`id` AS `id`,`admdb`.`users`.`username` AS `username`,`admdb`.`users`.`name` AS `name`,`admdb`.`users`.`email` AS `email`,`admdb`.`users`.`email_verified_at` AS `email_verified_at`,`admdb`.`users`.`password` AS `password`,`admdb`.`users`.`remember_token` AS `remember_token`,`admdb`.`users`.`status` AS `status`,`admdb`.`users`.`is_admin` AS `is_admin`,`admdb`.`users`.`external_auth` AS `external_auth`,`admdb`.`users`.`team_id` AS `team_id`,`admdb`.`users`.`created_at` AS `created_at`,`admdb`.`users`.`updated_at` AS `updated_at` from `admdb`.`users`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `users`");
    }
};
