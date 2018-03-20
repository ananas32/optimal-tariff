<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('network_call_id')->unsigned();
            $table->integer('other_call_id')->unsigned();
            $table->integer('fixed_call_id')->unsigned();
            $table->integer('message_id')->unsigned();
            $table->integer('mms_message_id')->unsigned();
            $table->integer('internet_package_id')->unsigned();
            $table->integer('tariff_name_id')->unsigned();
            $table->string('link', 255);
            $table->integer('operator_id')->unsigned();
            $table->integer('regular_payment_id')->unsigned();
            $table->integer('price');
            $table->boolean('active')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('network_call_id')->references('id')->on('calls')->onDelete('cascade');
            $table->foreign('other_call_id')->references('id')->on('calls')->onDelete('cascade');
            $table->foreign('fixed_call_id')->references('id')->on('calls')->onDelete('cascade');
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->foreign('mms_message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->foreign('internet_package_id')->references('id')->on('internet_packages')->onDelete('cascade');
            $table->foreign('tariff_name_id')->references('id')->on('tariff_names')->onDelete('cascade');
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
            $table->foreign('regular_payment_id')->references('id')->on('regular_payments')->onDelete('cascade');
        });

        Schema::create('tariff_region', function (Blueprint $table) {
            $table->integer('tariff_id')->unsigned();
            $table->integer('region_id')->unsigned();

            $table->foreign('tariff_id')->references('id')->on('tariffs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['tariff_id', 'region_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tariff_region');
        Schema::drop('tariffs');
    }
}
