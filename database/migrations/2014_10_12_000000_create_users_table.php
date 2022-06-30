<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name', 125);
            $table->string('email')->unique();
            $table->string('company_name', 100)->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('login_mode');
            $table->string('login_method', 50)->default('email');
            $table->string('password');
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
}
