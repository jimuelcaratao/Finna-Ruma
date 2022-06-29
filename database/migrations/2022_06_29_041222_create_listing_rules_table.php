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

            $table->text('rule')->nullable();

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
