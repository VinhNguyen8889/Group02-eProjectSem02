<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('teacher_id')->nullable()->default(0);
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('shift_id');
            $table->date('planned_start_date');
            $table->double('applied_fee');

            $table->foreign('teacher_id')->references('id')->on('users');
            $table->foreign('year_id')->references('id')->on('student_years');
            $table->foreign('group_id')->references('id')->on('student_groups');
            $table->foreign('subject_id')->references('id')->on('student_subjects');
            $table->foreign('day_id')->references('id')->on('student_days');
            $table->foreign('shift_id')->references('id')->on('student_shifts');

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
        Schema::dropIfExists('student_classes');
    }
}
