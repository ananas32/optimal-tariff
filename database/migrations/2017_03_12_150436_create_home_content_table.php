<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_content', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('home_content_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('home_content_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');
            $table->unique(['home_content_id', 'locale']);
            $table->foreign('home_content_id')->references('id')->on('home_content')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_content');
        Schema::dropIfExists('home_content_translations');
    }
}
