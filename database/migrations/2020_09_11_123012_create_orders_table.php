<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id'); // unsigned for foreign key.
            $table->foreign('customer_id') // foreign key column name.
            ->references('id') // parent table primary key.
            ->on('customers') // parent table name.
            ->onDelete('cascade'); // this will delete all the children rows when the parent row is deleted.
            $table->integer('total');
            $table->string('address');
            $table->string('telephone', 25);
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
