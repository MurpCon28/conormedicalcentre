<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Role;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $role_user = Role::where('name', 'patient')->first();
      //
      // foreach($role_user->users as $patient_info) {
      //   $patient_info = new Patient();
      //   $patient_info->insurance = rand(1, 100) . " Main Street";
      //   $patient_info->insurance_company = rand(1, 100) . " Insurance";
      //   $patient_info->policy_number = 0 . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      //   $patient_info->patient_id = $patient->id;
      //   $patient_info->save();
      // }
    }

    // private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    // {
    //   $pieces = [];
    //   $max = mb_strlen($keyspace, '8bit') - 1;
    //   for ($i = 0; $i < $length; ++$i) {
    //     $pieces []= $keyspace[random_int(0, $max)];
    //   }
    //   return implode('', $pieces);
    // }
}
