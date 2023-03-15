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
            $table->tinyInteger("status")->default(0);
            $table->string("payment_intent_id");
            $table->string("customer_first_name");
            $table->string("customer_last_name");
            $table->string("customer_emil");
            $table->string("shipping_address");
            $table->string("billing_address");
            $table->tinyInteger("quantity")->min(1);
            $table->decimal("amount", 8, 2);
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
