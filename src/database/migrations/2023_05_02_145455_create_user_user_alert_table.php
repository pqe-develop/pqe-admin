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
        Schema::create('user_user_alert', function (Blueprint $table) {
            $table->unsignedInteger('user_alert_id')->index('user_alert_id_fk_1705699');
            $table->unsignedInteger('user_id')->index('user_id_fk_1705699');
            $table->boolean('read')->default(false);
            $table->boolean('close')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_user_alert');
    }
};
