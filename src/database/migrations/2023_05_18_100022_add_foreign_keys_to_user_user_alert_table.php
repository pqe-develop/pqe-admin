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
        if (Schema::hasTable('user_user_alert')) {
            Schema::table('user_user_alert', function (Blueprint $table) {
                $table->foreign(['user_alert_id'], 'user_alert_id_fk_1705699')->references(['id'])->on('user_alerts')->onDelete('CASCADE');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('user_user_alert')) {
            Schema::table('user_user_alert', function (Blueprint $table) {
                $table->dropForeign('user_alert_id_fk_1705699');
            });
        }
    }
};
