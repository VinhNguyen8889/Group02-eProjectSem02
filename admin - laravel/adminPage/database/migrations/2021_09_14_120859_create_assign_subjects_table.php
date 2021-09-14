<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('objective_mark')->nullable();
            $table->unsignedInteger('assignment_mark')->nullable();
            $table->unsignedInteger('attendance_mark')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('school_subject_id');
            $table->foreign('class_id')->references('id')->on('student_classes');
            $table->foreign('school_subject_id')->references('id')->on('school_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_subjects');
    }
}
