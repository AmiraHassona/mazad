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
        Schema::create('coupons', function (Blueprint $table){
            $table->id();
            $table->string('code');
            $table->double('discount')->default(0);
            $table->string('discount_type')->nullable();
            $table->double('max_discount')->default(0);
            $table->string('type');
            $table->integer('starts_at');
            $table->integer('ends_at');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('coupons');
    }
};
