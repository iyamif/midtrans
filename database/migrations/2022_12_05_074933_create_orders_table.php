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
        Schema::create('orders', function (Blueprint $table) {
            // $table->id();
            // $table->uuid('order_id');
            // $table->string('name');
            // $table->text('address');
            // $table->string('phone');
            // $table->integer('qty');
            // $table->bigInteger('total_price');
            // $table->enum('status', ['Unpaid', 'Paid']);
            // $table->timestamps();
            
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->string('order_code');
            $table->string('name');
            $table->bigInteger('phone');
            $table->string('address');
            $table->text('note')->nullable();
            $table->bigInteger('total');
            $table->integer('status');
            $table->text('status_payment');
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
};
