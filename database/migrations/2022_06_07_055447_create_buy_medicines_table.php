<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_medicines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicinedetail_id');
            $table->decimal('quantity')->nullable();
            $table->decimal('amount')->nullable();
            $table->text('date')->nullable();
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
        Schema::dropIfExists('buy_medicines');
    }
}
