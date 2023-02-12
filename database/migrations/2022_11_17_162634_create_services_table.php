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
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id');
            $table->integer('service_cat_id');
            $table->string('service_cat_name');
            $table->string('service_name');
            $table->float('service_cost');
            $table->float('service_discount');
            $table->text('service_unit');
            $table->float('service_discount_cost');
            $table->text('service_details');
            $table->text('service_status')->default('Enable');
            $table->integer('service_delete')->default(0);
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
        Schema::dropIfExists('services');
    }
};
