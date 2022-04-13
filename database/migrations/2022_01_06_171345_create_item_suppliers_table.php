<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_supplier', function (Blueprint $table) {
            $table->id();
            //General error: 1005 Can't create table `livewire_table_test`.`items_suppliers`
            // (errno: 150 "Foreign key constraint is incorrectly formed")
            // $table->integer('item_id')->unsigned();

            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('item_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

            $table->integer('quantity');
            $table->decimal('price');
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
        Schema::dropIfExists('item_supplier');
    }
}
