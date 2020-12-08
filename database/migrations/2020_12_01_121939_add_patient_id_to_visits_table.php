<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientIdToVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visits', function (Blueprint $table) {
          $table->dropColumn('patientName');
          $table->unsignedBigInteger('patient_id');

          $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('restrict');
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
          $table->dropForeign(['patient_id']);
          $table->dropColumn('patient_id');
          $table->string('patientName');
        });
    }
}
