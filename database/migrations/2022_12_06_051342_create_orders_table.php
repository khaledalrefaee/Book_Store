<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('address_id');
            $table->string('s_address');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('payment_type');
            $table->float('amount',8,2);
            $table->string('invoice_no');
            $table->string('order_date');
            $table->string('confirmed_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
