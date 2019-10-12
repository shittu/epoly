<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionCourseRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_course_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('session_registration_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('session_registrations')
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
            $table->integer('course_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('courses')
            ->delete('restrict')
            ->update('cascade');
            $table->string('cancelation_status')->default(0);
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
        Schema::dropIfExists('session_course_registrations');
    }
}
