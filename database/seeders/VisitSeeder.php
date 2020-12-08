<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $conormurphy = User::where('name', "Conor Murphy")->first();
      $hollydustin = User::where('name', "Holly Dustin")->first();
      $omartodd = User::where('name', "Omar Todd")->first();
      $jimjames = User::where('name', "Jim James")->first();
      $jenlaw = User::where('name', "Jen Law")->first();
      $gavinkelly = User::where('name', "Gavin Kelly")->first();

      $visit = new Visit();
      $visit->patient_id = $jenlaw->patient->id;
      $visit->doctor_id = $omartodd->doctor->id;
      $visit->dateTime = '2000-01-01 13:25:00';
      $visit->duration = 5;
      $visit->cost = 250;
      $visit->save();

      $visit = new Visit();
      $visit->patient_id = $jimjames->patient->id;
      $visit->doctor_id = $conormurphy->doctor->id;
      $visit->dateTime = '2020-12-13 17:42:00';
      $visit->duration = 2;
      $visit->cost = 130;
      $visit->save();

      $visit = new Visit();
      $visit->patient_id = $gavinkelly->patient->id;
      $visit->doctor_id = $hollydustin->doctor->id;
      $visit->dateTime = '2020-12-23 10:57:00';
      $visit->duration = 1;
      $visit->cost = 80;
      $visit->save();
    }
}
