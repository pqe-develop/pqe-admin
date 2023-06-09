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
        if (Schema::hasTable('role_user')) {
            Schema::table('role_user', function (Blueprint $table) {
                $table->foreign(['role_id'], 'role_id_fk_1690886')->references(['id'])->on('roles')->onDelete('CASCADE');
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
        if (Schema::hasTable('role_user')) {
            Schema::table('role_user', function (Blueprint $table) {
                $table->dropForeign('role_id_fk_1690886');
            });
        }
    }
};
