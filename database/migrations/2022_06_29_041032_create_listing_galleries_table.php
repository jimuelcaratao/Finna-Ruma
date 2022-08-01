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
        Schema::create('listing_galleries', function (Blueprint $table) {
            $table->id('listing_gallery_id');
            $table->foreignId('listing_id');

            $table->text('photo_1')->nullable();
            $table->text('photo_2')->nullable();
            $table->text('photo_3')->nullable();
            $table->text('photo_4')->nullable();
            $table->text('photo_5')->nullable();
            $table->text('photo_6')->nullable();

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
        Schema::dropIfExists('listing_galleries');
    }
};
