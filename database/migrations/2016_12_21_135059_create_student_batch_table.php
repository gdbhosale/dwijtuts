<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_batch', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned();
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('batch_id')->unsigned();
			$table->foreign('batch_id')->references('id')->on('batches')->onUpdate('cascade')->onDelete('cascade');
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
        if (Schema::hasTable('student_batch')) {
            Schema::drop('student_batch');
        }
    }
}
