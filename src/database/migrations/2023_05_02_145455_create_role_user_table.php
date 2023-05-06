<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_2')->create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->index('user_id_fk_1690886');
            $table->unsignedInteger('role_id')->index('role_id_fk_1690886');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_2')->dropIfExists('role_user');
    }
};
