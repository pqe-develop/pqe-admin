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
        if (!Schema::hasTable('user_alerts')) {
            Schema::create('user_alerts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('alert_text');
                $table->string('alert_link')->nullable();
                $table->string('alert_type', 100)->nullable();
                $table->integer('record_id')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('user_alerts');
    }
};
