<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution');
            $table->string('area');
            $table->string('study_type',100);
            $table->date('start_date')->nullable();//date field
            $table->date('end_date')->nullable();//date field
            $table->unsignedFloat('gpa',4,2);
            $table->json('courses');//json field
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
        Schema::dropIfExists('education');
    }
}
