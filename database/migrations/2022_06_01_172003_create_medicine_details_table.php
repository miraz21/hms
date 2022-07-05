<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_details', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('medicinecompany_id');
            $table->unsignedBigInteger('medicinename_id')->unique();
            $table->float('price')->nullable();
            // $table->float('discount')->nullable();
            $table->decimal('quantity')->nullable();
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
        Schema::dropIfExists('medicine_details');
    }
}
