<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Visit;


class PatientController extends Controller
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
      $patients = Patient::all();

      return view('admin.patients.index', [
        'patients' => $patients
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $patients = Patient::all();

      return view('admin.patients.create', [
        'patients' => $patients
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
        'insurance' => 'required',
        'insurance_company' => 'required|max:191',
        'policy_number' => 'required|max:14'
      ]);
      $role_patient = Role::where('name', 'patient')->first();

      $patient = new User();
      $patient->name = $request->input('name');
      $patient->email = $request->input('email');
      $patient->address = $request->input('address');
      $patient->phone = $request->input('phone');
      $patient->password = $request->input('password');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient_info = new Patient();
      $patient_info->insurance = $request->input('insurance');
      $patient_info->insurance_company = $request->input('insurance_company');
      $patient_info->policy_number = $request->input('policy_number');
      $patient_info->user_id = $patient->id;
      $patient_info->save();

      return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = Patient::findOrFail($id);
      // $visit = Visit::findOrFail($id);

      return view('admin.patients.show', [
        'patient' => $patient
        // 'visit' => $visit
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
      $patient = Patient::findOrFail($id);

      return view('admin.patients.edit', [
        'patient' => $patient
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
        'insurance' => 'required',
        'insurance_company' => 'required|max:191',
        'policy_number' => 'required|max:191'

      ]);
      $role_patient = Role::where('name', 'patient')->first();

      $patient = User::findOrFail($id);
      $patient->name = $request->input('name');
      $patient->email = $request->input('email');
      $patient->address = $request->input('address');
      $patient->phone = $request->input('phone');
      $patient->password = $request->input('password');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient_info = Patient::findOrFail($id);
      $patient_info->insurance = $request->input('insurance');
      $patient_info->insurance_company = $request->input('insurance_company');
      $patient_info->policy_number = $request->input('policy_number');
      $patient_info->user_id = $patient->id;
      $patient_info->save();

      return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::findOrFail($id);
      $patient->delete();

      return redirect()->route('admin.patients.index');
    }
}
