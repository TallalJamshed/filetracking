<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackingdata', function (Blueprint $table) {
            $table->bigIncrements('track_id');
            $table->integer('fk_file_id');
            $table->string('reference_no');
            $table->integer('fk_department_id');
            $table->integer('fk_user_id');
            $table->integer('fk_position_id');
            $table->date('date_recieved')->nullable();
            $table->integer('recieved_by')->nullable();
            $table->integer('sent_to')->nullable();
            $table->string('track_name');
            $table->date('track_date');

            $table->string('comments')->nullable();
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
        Schema::dropIfExists('trackingdata');
    }
}
