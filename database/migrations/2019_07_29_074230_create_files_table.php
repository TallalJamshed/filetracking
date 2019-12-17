<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filedata', function (Blueprint $table) {
            $table->bigIncrements('file_id');
            // $table->string('reference_no');
            $table->date('date_added');
            // $table->date('date_recieved');
            $table->date('date_finished')->nullable();
            $table->string('finished_by')->nullable();
            $table->string('subject');
            $table->string('status');
            // $table->string('comments');
            $table->integer('created_by');
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
        Schema::dropIfExists('filedata');
    }
}
