<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('quantity')->default(0);
            $table->string('img');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('perk_id')->nullable();
            $table->foreign('perk_id')->references('id')->on('perks');
            $table->unsignedBigInteger('rarity_id');
            $table->foreign('rarity_id')->references('id')->on('rarities');
            $table->unsignedBigInteger('tier_id')->nullable();
            $table->foreign('tier_id')->references('id')->on('tiers');
            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id')->references('id')->on('sources');
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
        Schema::dropIfExists('resources');
    }
}
