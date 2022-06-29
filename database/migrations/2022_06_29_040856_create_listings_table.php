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
        Schema::create('listings', function (Blueprint $table) {
            $table->id('listing_id');
            $table->foreignId('user_id'); // host

            $table->string('listing_title', 255);
            $table->longText('description')->nullable();

            $table->string('location')->nullable();
            $table->string('map_pin')->nullable();
            $table->string('location_details')->nullable();

            $table->string('bedrooms')->nullable();
            $table->string('beds')->nullable();
            $table->string('bathrooms')->nullable();

            $table->string('property_type')->nullable(); // house, apartment, guesthouse, hotel

            $table->string('listing_status');
            $table->text('default_photo')->nullable();
            $table->integer('viewers')->nullable();

            $table->longText('additional_notes')->nullable();

            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
