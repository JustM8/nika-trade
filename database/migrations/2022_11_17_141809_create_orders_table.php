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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')->constrained('order_statuses');

            $table->text('company_name');
            $table->string('phone',15);
            $table->string('email');

            $table->string('name',45);
            $table->string('phone_delivery',15);
            $table->string('city',255);
            $table->string('address',255);
            $table->text('comment');
            $table->tinyInteger('delivery_type');
            $table->string('delivery_info',255);


            $table->unsignedFloat('total');

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
};
