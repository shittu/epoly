<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    protected $hidden = ['grade','points','remark'];
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
            $table->string('ca')->default('--');
            $table->string('exam')->default('--');
            $table->string('grade')->default('--');
            $table->string('points')->default('--');
            $table->string('remark')->default('--');
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
