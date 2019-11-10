<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepeatCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repeat_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('courses')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('session_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('sessions')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('student_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('students')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('repeat_courses');
    }
}
