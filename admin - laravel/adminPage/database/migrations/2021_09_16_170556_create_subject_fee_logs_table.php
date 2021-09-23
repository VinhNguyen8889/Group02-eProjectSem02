<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectFeeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_fee_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id')->comment('subject_id=Subject_id');
            $table->integer('fee_amount');
            $table->date('effective_date');
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('student_subjects')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_fee_logs');
    }
}
