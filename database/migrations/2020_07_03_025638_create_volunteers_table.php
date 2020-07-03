<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('organization');
            $table->string('position');
            $table->string('website');
            $table->date('start_date')->nullable();//date field
            $table->date('end_date')->nullable();//date field
            $table->text('summary');
            $table->string('highlights');
            $table->unsignedBigInteger('user_id')->nullable();//foreign key from users table
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('volunteers');
    }
}
