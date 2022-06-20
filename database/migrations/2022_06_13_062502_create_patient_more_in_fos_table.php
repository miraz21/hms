<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMoreInFosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_more_in_fos', function (Blueprint $table) {
            $table->id();
            $table->integer('pathological_id')->nullable();
            $table->unsignedBigInteger('appointment_id');
            $table->unsignedBigInteger('test_info_id');
            $table->decimal('discount')->nullable();
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
        Schema::dropIfExists('patient_more_in_fos');
    }
}
