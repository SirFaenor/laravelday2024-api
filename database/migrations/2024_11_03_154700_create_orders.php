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
            $table->string('code');
            $table->string('hash')->nullable();
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->string('customer_email');
            $table->decimal('subtotal', 10, 2);
            $table->string('status')->default('new');

            $table->unique('code');
            $table->foreign('cart_id')->references('id')->on('carts')->cascadeOnUpdate()->nullOnDelete();

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
