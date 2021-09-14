<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_amounts', function (Blueprint $table) {
            $table->id();
            // $table->integer('fee_category_id');
            // $table->integer('class_id');
            $table->double('amount');
            $table->timestamps();

            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('fee_category_id');
            $table->foreign('class_id')->references('id')->on('student_classes');
            $table->foreign('fee_category_id')->references('id')->on('fee_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_amounts');
    }
}
