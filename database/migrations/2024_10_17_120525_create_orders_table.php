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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_user_id');
            $table->foreign('fk_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');
            $table->decimal('amount', 9, 3);
            $table->string('contact_name');
            $table->string('email')->nullable();
            $table->string('telephone');
            $table->string('company')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('post_code');
            $table->string('country');
            $table->string('region');
            $table->boolean('disable')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
