<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_contributions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('contribution_id');
            $table->foreign('contribution_id')
                ->references('id')
                ->on('contributions');

            $table->unsignedBigInteger('discord_user_id');
            $table->foreign('discord_user_id')
                ->references('id')
                ->on('discord_users');

            $table->unsignedBigInteger('resource_id');
            $table->foreign('resource_id')
                ->references('id')
                ->on('resources');

            $table->decimal('quantity_resource_request');
            $table->decimal('quantity_resource_received');

            $table->boolean('contribution_complete')->default(false);

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
        Schema::dropIfExists('item_contributions');
    }
}
