<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesHasStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('class_has_students');
        Schema::create('class_has_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id')->unsigned()->nullable();
            $table->foreign('class_id')
                ->references('id')->on('classes');
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')
                ->references('id')->on('students');
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
        Schema::dropIfExists('classes_has_students');
    }
}
