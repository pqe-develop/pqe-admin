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
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign(['permission_id'], 'permission_id_fk_1690877')->references(['id'])->on('permissions')->onDelete('CASCADE');
            $table->foreign(['role_id'], 'role_id_fk_1690877')->references(['id'])->on('roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('permission_id_fk_1690877');
            $table->dropForeign('role_id_fk_1690877');
        });
    }
};
