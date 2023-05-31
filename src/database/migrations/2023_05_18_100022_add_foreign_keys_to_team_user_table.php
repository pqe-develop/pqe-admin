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
        if (Schema::hasTable('team_user')) {
            Schema::table('team_user', function (Blueprint $table) {
                $table->foreign(['team_id'], 'team_id_fk_1690886')->references(['id'])->on('teams')->onDelete('CASCADE');
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
        if (Schema::hasTable('team_user')) {
            Schema::table('team_user', function (Blueprint $table) {
                $table->dropForeign('team_id_fk_1690886');
            });
        }
    }
};
