<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('admission_date');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('user_id');
            $table->text('description');
            $table->datetime('delivery_date')->nullable();
            $table->unsignedInteger('user_id_deliver')->nullable();
            $table->text('who_takes')->nullable();
            $table->timestamps();

            // Llaves foraneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statusoutputs')->onDelete('cascade');
            $table->foreign('user_id_deliver')->references('id')->on('users')->onDelete('cascade');
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
