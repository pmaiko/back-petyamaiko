<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionMainBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_main_banner', function (Blueprint $table) {
          $table->id();
          $table->string('name')->default('section_main_banner');
          $table->string('image');
          $table->string('title');
          $table->string('description');
          $table->string('button_label');
          $table->string('hint');
          $table->unsignedBigInteger('page_id');
          $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
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
        Schema::dropIfExists('section_main_banner');
    }
}
