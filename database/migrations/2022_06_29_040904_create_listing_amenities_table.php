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
            $table->string('wifi')->nullable()->default(0);
            $table->string('washer')->nullable()->default(0);
            $table->string('air_conditioning')->nullable()->default(0);
            $table->string('heating')->nullable()->default(0);
            $table->string('tv')->nullable()->default(0);
            $table->string('iron')->nullable()->default(0);
            $table->string('kitchen')->nullable()->default(0);
            $table->string('dryer')->nullable()->default(0);
            $table->string('dedicated_workspace')->nullable()->default(0);
            $table->string('hair_dryer')->nullable()->default(0);

            //features
            $table->string('pool')->nullable()->default(0);
            $table->string('free_parking')->nullable()->default(0);
            $table->string('crib')->nullable()->default(0);
            $table->string('grill')->nullable()->default(0);
            $table->string('gym')->nullable()->default(0);
            $table->string('smoking_allowed')->nullable()->default(0);
            $table->string('breakfast')->nullable()->default(0);

            //safety
            $table->string('smoke_alarm')->nullable()->default(0);
            $table->string('carbon_monoxide_alarm')->nullable()->default(0);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();


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
