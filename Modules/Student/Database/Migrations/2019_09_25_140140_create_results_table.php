<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_course_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('student_courses')
            ->delete('restrict')
            ->update('cascade');
            $table->string('ca');
            $table->string('exam');
            $table->string('grade');
            $table->float('points');
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
        Schema::dropIfExists('results');
    }
}
