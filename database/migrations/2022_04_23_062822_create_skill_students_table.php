<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_students', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('skill_courses_id')->unsigned();
            $table->foreign('skill_courses_id')->references('id')->on('skill_courses');
            $table->integer('skill_faculty_id');
            $table->foreign('skill_faculty_id')->references('id')->on('skill_faculties');
            $table->unique(['student_id', 'skill_faculty_id']);
            $table->string('status');
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
        Schema::dropIfExists('skill_students');
    }
}
