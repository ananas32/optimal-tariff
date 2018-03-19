<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariffNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_names', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('tariff_name_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tariff_name_id')->unsigned();
            $table->string('locale')->index();
            $table->string('tariff_name');
            $table->unique(['tariff_name_id', 'locale']);
            $table->foreign('tariff_name_id')->references('id')->on('tariff_names')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tariff_name_translations');
        Schema::drop('tariff_names');
    }
}
