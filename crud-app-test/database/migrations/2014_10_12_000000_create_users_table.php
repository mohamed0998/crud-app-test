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
            $table->increments('id');
            $table->string('userId')->unique();
            $table->string('username')->nullable();
            $table->string('fullname')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('emailPec')->unique();
            $table->dateTime('dateOfBirth')->nullable();
            $table->dateTime('lastLogin')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
