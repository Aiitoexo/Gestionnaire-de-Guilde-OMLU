<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discord_users', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo')->unique();
            $table->string('id_discord_user')->unique();

            $table->unsignedBigInteger('squad_id')->nullable();
            $table->foreign('squad_id')
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

            $table->unsignedBigInteger('classe_id')->nullable();
            $table->foreign('classe_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discord_users');
    }
}
