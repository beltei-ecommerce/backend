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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_order_id');
            $table->foreign('fk_order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('no action');
            $table->decimal('amount', 9, 3);
            $table->string('source');
            $table->string('currency');
            $table->string('payment_method_type');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
