<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_category_id');
            $table->foreign('fk_category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('product_code');
            $table->decimal('price', 9, 3);
            $table->integer('quantity');
            $table->text('description')->nullable();
            $table->text('description2')->nullable();
            $table->boolean('disable')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
