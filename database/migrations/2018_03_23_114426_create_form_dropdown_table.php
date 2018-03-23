<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormDropdownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropdown_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name', 100);
            $table->timestamps();
        });

        Schema::create('form_dropdowns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dropdown_text_id')->unsigned();
            $table->string('text_dropdown');
            $table->string('value');
            $table->foreign('dropdown_text_id')->references('id')->on('dropdown_texts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('from_dropdowns');
        Schema::drop('dropdown_texts');
    }
}
