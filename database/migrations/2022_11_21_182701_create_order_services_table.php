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
        Schema::create('order_services', function (Blueprint $table) {
            $table->id('os_id');
            $table->integer('os_customer_id');
            $table->integer('os_service_id');
            $table->float('os_service_cost');
            $table->integer('os_service_quantity');
            $table->float('os_service_discount');
            $table->float('os_service_discount_cost');
            $table->float('os_service_total_cost');
            $table->string('os_technician_name')->nullable();
            $table->string('os_technician_phone')->nullable();
            $table->date('os_service_date')->nullable();
            $table->text('os_status')->default('Pending');
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
        Schema::dropIfExists('order_services');
    }
};
