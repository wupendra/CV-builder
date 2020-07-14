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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username',100)->unique();
            $table->string('phone',20)->nullable();
            $table->string('label')->nullable();
            $table->string('website')->nullable();
            $table->string('summary')->nullable();
            $table->string('summary')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('visibility')->default(0);
            $table->boolean('username_flag')->default(0);
            $table->boolean('uptodate')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
