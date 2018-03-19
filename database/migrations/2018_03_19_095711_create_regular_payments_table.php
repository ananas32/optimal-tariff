<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegularPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regular_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('regular_payment_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('regular_payment_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name_payment');
            $table->unique(['regular_payment_id', 'locale']);
            $table->foreign('regular_payment_id')->references('id')->on('regular_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('regular_payment_translations');
        Schema::drop('regular_payments');
    }
}
