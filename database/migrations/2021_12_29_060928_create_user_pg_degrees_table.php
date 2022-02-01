<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPgDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pg_degrees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('passed_out')->nullable();
            $table->string('studying_year')->nullable();
            $table->bigInteger('degree_id');
            $table->bigInteger('specializtion_id');
            $table->bigInteger('college_id');
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
        Schema::dropIfExists('user_pg_degrees');
    }
}
