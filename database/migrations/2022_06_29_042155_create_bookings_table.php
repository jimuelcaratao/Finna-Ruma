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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id')->from(1000000);
            $table->foreignId('user_id');
            $table->foreignId('host_id');

            $table->foreignId('listing_id');

            $table->string('booking_status')->nullable(); //cancelled, paid, complete, ongoing
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable(); // halfed, unpaid, fully paid
            $table->timestamp('paid_at')->nullable();

            $table->string('check_in');
            $table->string('checkout');
            $table->string('days');

            $table->string('adults');
            $table->string('children');
            $table->string('infants');
            $table->string('pets');

            $table->string('service_fee');
            $table->string('price_per_night');
            $table->string('pending_total');
            $table->string('total');

            $table->string('total_paid')->nullable();

            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('reviewed_at')->nullable();


            $table->boolean('viewed_by_host')->default(0)->nullable();
            $table->boolean('viewed_by_user')->default(0)->nullable();

            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('host_id')->references('id')->on('users');
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
        Schema::dropIfExists('bookings');
    }
};
