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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('address_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('coupon_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('sub_total',8,2);
            $table->double('total',8,2);
            $table->boolean('payments_type');
            $table->string('payments_method');
            $table->string('payments_status');
            $table->boolean('order_status');
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
