<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('chapter_course', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('chapter_id')->unsigned();
			$table->foreign('chapter_id')->references('id')->on('chapters')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('course_id')->unsigned();
			$table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
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
        if (Schema::hasTable('chapter_course')) {
            Schema::drop('chapter_course');
        }
    }
}
