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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 45)->nullable();
            $table->text('description');
            $table->string('subject_type')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('user_name', 45)->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->text('properties')->nullable();
            $table->text('updated_data')->nullable();
            $table->string('host', 45)->nullable();
            $table->timestamps();

            $table->index(['subject_type', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_logs');
    }
};
