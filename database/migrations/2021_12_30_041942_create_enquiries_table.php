<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('enquiry_id');
            $table->bigInteger('course_id');
            $table->bigInteger('batch_id')->nullable();
            $table->string('status');
            $table->string('date');
            $table->string('time');
            $table->string('follow_date_time')->nullable();
            $table->string('payment_date_time')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
}
