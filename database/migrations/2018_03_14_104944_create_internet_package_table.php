<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternetPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internet_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('unlimited');
            $table->string('tariff_package');
            $table->string('quantity');
            $table->string('price');
            $table->timestamps();
        });

        Schema::create('social_networks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('social_package', function (Blueprint $table) {
            $table->integer('social_id')->unsigned();
            $table->integer('package_id')->unsigned();

            $table->foreign('social_id')->references('id')->on('social_networks')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('internet_packages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['social_id', 'package_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('social_package');
        Schema::drop('social_networks');
        Schema::drop('internet_packages');
    }
}
