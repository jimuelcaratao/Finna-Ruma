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
        Schema::create('listing_amenities', function (Blueprint $table) {
            $table->id('listing_amenity_id');
            $table->foreignId('listing_id');

            //essentials
            $table->string('wifi')->nullable();
            $table->string('washer')->nullable();
            $table->string('air_conditioning')->nullable();
            $table->string('heating')->nullable();
            $table->string('tv')->nullable();
            $table->string('iron')->nullable();
            $table->string('kitchen')->nullable();
            $table->string('dryer')->nullable();
            $table->string('dedicated_workspace')->nullable();
            $table->string('hair_dryer')->nullable();

            //features
            $table->string('pool')->nullable();
            $table->string('free_parking')->nullable();
            $table->string('crib')->nullable();
            $table->string('grill')->nullable();
            $table->string('gym')->nullable();
            $table->string('smoking_allowed')->nullable();
            $table->string('breakfast')->nullable();

            //safety
            $table->string('smoke_alarm')->nullable();
            $table->string('carbon_monoxide_alarm')->nullable();

            $table->foreign('listing_id')->references('listing_id')->on('listings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_amenities');
    }
};
