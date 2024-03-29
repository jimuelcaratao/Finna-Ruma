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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('student_id')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable(); //if admin or user (active/inactive) else host (Approved/Pending/Denied)
            $table->string('contact')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('external_provider')->nullable();
            $table->string('external_id')->nullable();
            $table->integer('is_admin')->default(0);
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamp('is_banned')->nullable();
            $table->timestamp('approved_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
