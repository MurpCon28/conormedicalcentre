<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;

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

      $doctor = new User();
      $doctor->name = 'Conor Murphy';
      $doctor->email = 'doctor@conormedicalcentre.ie';
      $doctor->address = '123 Pikens Road';
      $doctor->phone = '1234567890';
      $doctor->password = Hash::make('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $patient = new User();
      $patient->name = 'Jim James';
      $patient->email = 'patient@conormedicalcentre.ie';
      $patient->address = '543 Road Lane';
      $patient->phone = '0987654321';
      $patient->password = Hash::make('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);
    }
}
