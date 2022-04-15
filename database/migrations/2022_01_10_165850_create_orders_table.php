<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('subtotal',15);
            $table->decimal('discount',15);
            $table->decimal('tax',15);
            $table->decimal('total',15);
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('mobile');
            $table->string('line1');
            $table->string('line2');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('zipcode');
            $table->enum('status',['ordered','delivered','canceled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);
            $table->date('delivered_date')->useCurrent();
            $table->date('canceled_date')->useCurrent();
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
}
