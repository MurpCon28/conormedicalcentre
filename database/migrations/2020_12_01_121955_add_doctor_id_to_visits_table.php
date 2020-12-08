<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorIdToVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visits', function (Blueprint $table) {
          $table->dropColumn('doctorName');
          $table->unsignedBigInteger('doctor_id');

          $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visits', function (Blueprint $table) {
          $table->dropForeign(['doctor_id']);
          $table->dropColumn('doctor_id');
          $table->string('doctorName');
        });
    }
}
