<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_doctor = Role::where('name', 'doctor')->first();
      $role_patient = Role::where('name', 'patient')->first();
      $role_admin = Role::where('name', 'admin')->first();

      $doctor = new User();
      $doctor->name = 'Conor Murphy';
      $doctor->email = 'doctor@conormedicalcentre.ie';
      $doctor->address = '123 Pikens Road';
      $doctor->phone = '1234567890';
      $doctor->password = Hash::make('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor_info = new Doctor();
      $doctor_info->date_started = Carbon::parse('4-07-2001');
      $doctor_info->user_id = $doctor->id;
      $doctor_info->save();

      $patient = new User();
      $patient->name = 'Jim James';
      $patient->email = 'patient@conormedicalcentre.ie';
      $patient->address = '543 Road Lane';
      $patient->phone = '0987654321';
      $patient->password = Hash::make('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient_info = new Patient();
      $patient_info->insurance = true;
      $patient_info->insurance_company = 'Gavin & Sons Insurance';
      $patient_info->policy_number = '12346621901234';
      $patient_info->user_id = $patient->id;
      $patient_info->save();

      $admin = new User();
      $admin->name = 'Harry John';
      $admin->email = 'admin@conormedicalcentre.ie';
      $admin->address = '23 Lane Park';
      $admin->phone = '1325476980';
      $admin->password = Hash::make('secret');
      $admin->save();
      $admin->roles()->attach($admin);

      $patient = new User();
      $patient->name = 'Jen Law';
      $patient->email = 'jen@conormedicalcentre.ie';
      $patient->address = '123 Fake Lane';
      $patient->phone = '0947324321';
      $patient->password = Hash::make('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient_info = new Patient();
      $patient_info->insurance = true;
      $patient_info->insurance_company = 'Gavin & Sons Insurance';
      $patient_info->policy_number = '12345678901234';
      $patient_info->user_id = $patient->id;
      $patient_info->save();

      $doctor = new User();
      $doctor->name = 'Holly Dustin';
      $doctor->email = 'holly@conormedicalcentre.ie';
      $doctor->address = '34 Fake Road';
      $doctor->phone = '1284217890';
      $doctor->password = Hash::make('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor_info = new Doctor();
      $doctor_info->date_started = Carbon::parse('2000-03-04');
      $doctor_info->user_id = $doctor->id;
      $doctor_info->save();

      $patient = new User();
      $patient->name = 'Gavin Kelly';
      $patient->email = 'gavin@conormedicalcentre.ie';
      $patient->address = '5 Fake City';
      $patient->phone = '0987900321';
      $patient->password = Hash::make('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient_info = new Patient();
      $patient_info->insurance = true;
      $patient_info->insurance_company = 'Chill Insurance';
      $patient_info->policy_number = '43210987654321';
      $patient_info->user_id = $patient->id;
      $patient_info->save();

      $doctor = new User();
      $doctor->name = 'Omar Todd';
      $doctor->email = 'omar@conormedicalcentre.ie';
      $doctor->address = '12 Lane Road';
      $doctor->phone = '1234744290';
      $doctor->password = Hash::make('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor_info = new Doctor();
      $doctor_info->date_started = Carbon::parse('2000-01-01');
      $doctor_info->user_id = $doctor->id;
      $doctor_info->save();
    }
}
