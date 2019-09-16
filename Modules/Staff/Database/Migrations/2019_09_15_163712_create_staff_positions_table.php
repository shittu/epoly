<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('department_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('departments')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('college_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('colleges')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('position_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('positions')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('staff_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('staff')
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
        Schema::dropIfExists('staff_positions');
    }
}
