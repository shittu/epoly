<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('session_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('sessions')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('exam_calender_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('exam_calenders')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('upload_result_calender_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('upload_result_calenders')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('semester_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('semesters')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('lecture_calender_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('lecture_calenders')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('course_allocation_calender_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('course_allocation_calenders')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('marking_calender_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('marking_calenders')
            ->delete('restrict')
            ->update('cascade');
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
        Schema::dropIfExists('calenders');
    }
}
