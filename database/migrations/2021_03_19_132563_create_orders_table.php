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
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('phone');
            $table->bigInteger('store_address_id')->unsigned()->nullable();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('delivery_type_id')->unsigned()->nullable();
            $table->bigInteger('gift_certificate_id')->unsigned()->nullable();
            $table->bigInteger('coupon_id')->unsigned()->nullable();
            $table->bigInteger('currency_id')->unsigned()->nullable();
            $table->decimal('subtotal',8,2);
            $table->decimal('total',8,2);
            $table->integer('quantity_total');
            $table->bigInteger('payment_type_id')->unsigned()->nullable();
            $table->foreignId('payment_status_id')->nullable()->constrained('payment_statuses');
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->foreign('store_address_id')->references('id')->on('store_addresses')->cascadeOnDelete();
            $table->foreign('delivery_type_id')->references('id')->on('delivery_types')->cascadeOnDelete();
            $table->foreign('gift_certificate_id')->references('id')->on('gift_certificates')->cascadeOnDelete();
            $table->foreign('coupon_id')->references('id')->on('coupons')->cascadeOnDelete();
            $table->foreign('currency_id')->references('id')->on('currencies')->cascadeOnDelete();
            $table->foreign('status_id')->references('id')->on('order_statuses')->cascadeOnDelete();
            $table->foreign('payment_type_id')->references('id')->on('payment_types')->cascadeOnDelete();
            $table->softDeletes();
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
