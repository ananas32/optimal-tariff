<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRandomTextHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_header', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });

        Schema::create('text_header_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('text_header_id')->unsigned();
            $table->string('locale')->index();
            $table->string('initials');
            $table->text('random_text');
            $table->unique(['text_header_id', 'locale']);
            $table->foreign('text_header_id')->references('id')->on('text_header')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_header');
        Schema::dropIfExists('text_header_translations');
    }
}
