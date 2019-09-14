<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadOfDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_of_departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('department_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('departments')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('lecturer_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('lecturers')
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
        Schema::dropIfExists('head_of_departments');
    }
}
