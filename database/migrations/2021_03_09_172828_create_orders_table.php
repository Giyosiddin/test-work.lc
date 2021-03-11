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
            $table->enum('order_status',['0','1','2','3'])->default('0');
            $table->string('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('fio')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('comment')->nullable();
            $table->string('total_amount')->default('0');
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
