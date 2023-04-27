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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('thumbnail',500)->nullable();
            $table->text('gallery')->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('featured')->default(0);
            $table->boolean('published')->default(0);
            $table->double('price',8,2);
            $table->double('discount')->default(0);
            $table->string('discount_type')->nullable();
            $table->string('meta_title',500)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_image',500)->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('products');
    }
};
