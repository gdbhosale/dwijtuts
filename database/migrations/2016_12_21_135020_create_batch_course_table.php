<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_course', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('batch_id')->unsigned();
			$table->foreign('batch_id')->references('id')->on('batches')->onUpdate('cascade')->onDelete('cascade');
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
        if (Schema::hasTable('batch_course')) {
            Schema::drop('batch_course');
        }
    }
}
