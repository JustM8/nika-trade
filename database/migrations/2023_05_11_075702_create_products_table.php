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

            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('products')->onDelete('cascade');

            $table->json('title');
            $table->json('description');
            $table->string('slug')->unique();
            $table->string('SKU',35)->unique();
            $table->json('size')->nullable();
            $table->float('price')->startingValue(1);
            $table->integer('discount')->nullable()->comment('discount in %');
            $table->unsignedInteger('in_stock')->default(0);
            $table->string('thumbnail');
            $table->string('obj_model')->nullable();
            $table->string('pdf')->nullable();


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
