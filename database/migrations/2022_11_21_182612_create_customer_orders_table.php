<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('order_customer_id');
            $table->string('order_customer_name');
            $table->string('order_customer_email');
            $table->string('order_customer_phone');
            $table->text('order_customer_address');
            $table->float('order_amount');
            $table->text('order_status')->default('Pending');
            $table->date('order_date');
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
        Schema::dropIfExists('customer_orders');
    }
};
