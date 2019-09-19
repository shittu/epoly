<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecurerCourseAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecurer_course_allocations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lecturer_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('lecturers')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('course_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('courses')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('department_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('departments')
            ->delete('restrict')
            ->update('cascade');
            $table->string('from');
            $table->string('to')->nullable();
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
        Schema::dropIfExists('lecurer_course_allocations');
    }
}
