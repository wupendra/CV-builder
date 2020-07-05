<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesettings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_name',100);
            $table->string('meta_title',55);
            $table->string('meta_keyword');
            $table->string('meta_description');
            $table->text('short_note');
            $table->text('address');
            $table->string('contact');
            $table->string('mobile',20);
            $table->string('facebook');
            $table->string('googleplus');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('linkedin');
            $table->string('admin_email');
            $table->json('options')->nullable();//site options
            $table->string('logo',100);
            $table->string('favicon',100);
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
        Schema::dropIfExists('sitesettings');
    }
}
