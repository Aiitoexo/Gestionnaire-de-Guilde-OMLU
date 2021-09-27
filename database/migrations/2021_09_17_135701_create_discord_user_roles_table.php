<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discord_user_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('discord_user_id');
            $table->foreign('discord_user_id')
                ->references('id')
                ->on('discord_users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('first_weapon_id')->nullable();
            $table->foreign('first_weapon_id')
                ->references('id')
                ->on('weapons')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('second_weapon_id')->nullable();
            $table->foreign('second_weapon_id')
                ->references('id')
                ->on('weapons')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('job_harvest_id')->nullable();
            $table->foreign('job_harvest_id')
                ->references('id')
                ->on('job_harvests')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('job_transformation_id')->nullable();
            $table->foreign('job_transformation_id')
                ->references('id')
                ->on('job_transformations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discord_user_infos');
    }
}
