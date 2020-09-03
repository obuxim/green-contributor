<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('teacher_or_parent_name');
            $table->string('description');
            $table->string('category');
            $table->integer('point');
            $table->string('youtube_link')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('user_id');
            $table->string('zone_name');
            $table->string('media_url')->nullable();
            $table->boolean('isYTvideo');
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
        Schema::dropIfExists('activities');
    }
}
