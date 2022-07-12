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
            $table->foreignId('category_id');

            $table->string('slug', 255);
            $table->string('listing_title', 255);
            $table->longText('description')->nullable();

            $table->string('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();

            $table->string('price_per_night')->nullable();
            $table->string('service_fee')->nullable();

            $table->string('max_guest')->nullable();
            $table->string('max_pet')->nullable();

            $table->string('location')->nullable();
            $table->string('map_pin')->nullable();
            $table->string('location_details')->nullable();

            $table->string('bedrooms')->nullable(); // no. of bed rooms
            $table->string('beds')->nullable(); // beds
            $table->string('bathrooms')->nullable(); // no. of bathrooms

            $table->string('property_type')->nullable(); // house, apartment, guesthouse, hotel

            $table->string('listing_status'); // Approved or Pending Approval, Denied
            $table->text('default_photo')->nullable();
            $table->integer('viewers')->nullable();

            $table->string('messenger_url')->nullable();

            $table->longText('additional_notes')->nullable();

            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('category_id')->on('categories');
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
