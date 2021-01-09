<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Visit;


class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    public function index()
    {
      // $doctors = User::all()->where('name', $roles);
      $doctors = Doctor::all();

      return view('admin.doctors.index', [
        'doctors' => $doctors
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $doctors = Doctor::all();

      return view('admin.doctors.create', [
        'doctors' => $doctors
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:191',
        'email' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|max:191',
        'password' => 'required|max:191',
        'date_started' => 'required'
      ]);
      $role_doctor = Role::where('name', 'doctor')->first();

      $doctor = new User();
      $doctor->name = $request->input('name');
      $doctor->email = $request->input('email');
      $doctor->address = $request->input('address');
      $doctor->phone = $request->input('phone');
      $doctor->password = $request->input('password');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor_info = new Doctor();
      $doctor_info->date_started = $request->input('date_started');
      $doctor_info->user_id = $doctor->id;
      $doctor_info->save();

      return redirect()->route('admin.doctors.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $doctor = Doctor::findOrFail($id);
      $visit = Visits::where($doctor->id = $id);

      return view('admin.doctors.show', [
        'doctor' => $doctor,
        'visit' => $visit
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $doctor = Doctor::findOrFail($id);

      return view('admin.doctors.edit', [
        'doctor' => $doctor
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:191',
        'email' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|max:191',
        'password' => 'required|max:191',
        'date_started' => 'required'

      ]);
      $role_doctor = Role::where('name', 'doctor')->first();

      $doctor = User::findOrFail($id);
      $doctor->name = $request->input('name');
      $doctor->email = $request->input('email');
      $doctor->address = $request->input('address');
      $doctor->phone = $request->input('phone');
      $doctor->password = $request->input('password');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor_info = Doctor::findOrFail($id);
      $doctor_info->date_started = $request->input('date_started');
      $doctor_info->user_id = $doctor->id;
      $doctor_info->save();

      return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $doctor = Doctor::findOrFail($id);
      $doctor->delete();

      return redirect()->route('admin.doctors.index');
    }
}
