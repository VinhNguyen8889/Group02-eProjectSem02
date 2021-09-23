<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_regs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id');
            $table->float('mark')->nullable();
            $table->text('voucher_name')->nullable();
            $table->text('value')->nullable();
            $table->float('fee_amount');
            $table->float('discount_amount')->nullable();
            $table->float('paid');
            $table->string('payment');
            $table->string('id_no');
            $table->foreign('class_id')->references('id')->on('student_classes');
            $table->foreign('student_id')->references('id')->on('users');

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
        Schema::dropIfExists('student_regs');
    }
}
