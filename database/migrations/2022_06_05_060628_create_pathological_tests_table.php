<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathologicalTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathological_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->unsignedBigInteger('test_info_id');
            $table->decimal('discount')->nullable();
            // $table->text('date')->nullable();
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
        Schema::dropIfExists('pathological_tests');
    }
}
