<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_feedback', function (Blueprint $table) {

            $table->id();
            $table->integer('skill_faculty_id')->unsigned();
            $table->foreign('skill_faculty_id')->references('id')->on('skill_faculties');
            $table->integer('skill_student_id')->unsigned();
            $table->foreign('skill_student_id')->references('id')->on('skill_students');
            $table->decimal('rating');
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('skill_feedback');
    }
}
