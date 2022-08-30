<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->bigInteger('kapital_order_id');
            $table->string('session_id');
            $table->string('currency');
            $table->string('order_status')->nullable();
            $table->string('order_description')->nullable();
            $table->string('amount');
            $table->string('payment_url');
            $table->string('status_code');
            $table->string('order_check_status')->nullable();
            $table->string('language_code');
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
        Schema::dropIfExists('payments');
    }
}
