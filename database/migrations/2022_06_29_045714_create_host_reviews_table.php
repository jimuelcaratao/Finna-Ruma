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
        Schema::create('host_reviews', function (Blueprint $table) {
            $table->id('host_review_id');
            $table->foreignId('user_id');
            $table->foreignId('booking_id');
            $table->foreignId('listing_id');

            $table->integer('stars')->nullable();
            $table->longText('body')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('viewed_by_host')->default(0)->nullable();
            $table->boolean('viewed_by_user')->default(0)->nullable();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('booking_id')->references('booking_id')->on('bookings');
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
        Schema::dropIfExists('host_reviews');
    }
};
