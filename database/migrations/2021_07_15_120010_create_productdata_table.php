<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdata', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('num_of_room');
            $table->string('address');
            $table->string('category');
            $table->string('image');
            $table->string('price');
            $table->string('status');
            $table->string('detail');
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
        Schema::dropIfExists('productdata');
    }
}
