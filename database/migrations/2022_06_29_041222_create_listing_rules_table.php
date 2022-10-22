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
        Schema::create('listing_rules', function (Blueprint $table) {
            $table->id('listing_rule_id');
            $table->foreignId('listing_id');

            $table->text('refundable')->nullable();
            $table->text('check_in')->nullable();
            $table->text('check_out')->nullable();
            $table->text('claygo')->nullable();
            $table->text('no_smoking')->nullable();
            $table->text('no_drinking')->nullable();
            $table->text('no_pets')->nullable();
            $table->text('no_events')->nullable();

            $table->longText('additional_rules')->nullable();

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
        Schema::dropIfExists('listing_rules');
    }
};
