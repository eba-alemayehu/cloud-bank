<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string("busyness_phone");
            $table->string("busyness_email");
            $table->string("busyness_region");
            $table->string("busyness_city");
            $table->string("busyness_zoon_or_subcity");
            $table->string("busyness_woreda");
            $table->string("website");
            $table->string("API_key");
            $table->string("listener_url");
            $table->integer("customer_id");
            $table->integer("merchent_id");
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
        Schema::dropIfExists('payment_services');
    }
}
