<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_news', 255);
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('type_news_id')->unsigned();
            $table->boolean('visible')->default(false);
            $table->integer('number_of_views')->default(false);
            $table->string('image', 255)->default(NULL);
            $table->timestamps();
            $table->foreign('type_news_id')->references('id')->on('type_news')->onDelete('cascade');

        });

        Schema::create('news_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title_news');
            $table->text('short_news');
            $table->text('full_news');
            $table->unique(['news_id', 'locale']);
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_news');
        Schema::dropIfExists('news');
        Schema::dropIfExists('news_translations');
    }
}
