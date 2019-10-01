<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_type_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('student_types')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('student_session_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('student_sessions')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('admission_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('admissions')
            ->delete('restrict')
            ->update('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('is_active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
