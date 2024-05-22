<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_gallery', function (Blueprint $table) {
            $table->id(); // Додайте окремий primary key
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('gallery_id')->constrained('galleries')->onDelete('cascade');
            $table->unique(['category_id', 'gallery_id']); // Додайте унікальний ключ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_gallery');
    }
};
