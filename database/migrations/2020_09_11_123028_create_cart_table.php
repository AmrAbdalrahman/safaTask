<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('item_id'); // unsigned for foreign key.
            $table->foreign('item_id') // foreign key column name.
            ->references('id') // parent table primary key.
            ->on('items') // parent table name.
            ->onDelete('cascade'); // this will delete all the children rows when the parent row is deleted.

            $table->unsignedBigInteger('customer_id'); // unsigned for foreign key.
            $table->foreign('customer_id') // foreign key column name.
            ->references('id') // parent table primary key.
            ->on('customers') // parent table name.
            ->onDelete('cascade'); // this will delete all the children rows when the parent row is deleted.
            $table->integer('quantity');
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
        Schema::dropIfExists('cart');
    }
}
