<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Patient;
use App\Models\Doctor;

class VisitController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $visits = Visit::all();

      return view('admin.visits.index', [
        'visits' => $visits
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
      $doctors = Doctor::all();

      return view('admin.visits.create', [
        'patients' => $patients,
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
        'patient_id' => 'required|max:191',
        'doctor_id' => 'required|max:191',
        'dateTime' => 'required',
        'duration' => 'required|integer|min:1',
        'cost' => 'required|numeric|min:0'
      ]);

      $visit = new Visit();
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->dateTime = $request->input('dateTime');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->save();

      return redirect()->route('admin.visits.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $visit = Visit::findOrFail($id);

      return view('admin.visits.show', [
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
      $visit = Visit::findOrFail($id);
      $patients = Patient::all();
      $doctors = Doctor::all();

      return view('admin.visits.edit', [
        'visit' => $visit,
        'patients' => $patients,
        'doctors' => $doctors
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
        'patient_id' => 'required|max:191',
        'doctor_id' => 'required|max:191',
        'dateTime' => 'required',
        'duration' => 'required|integer|min:1',
        'cost' => 'required|numeric|min:0'
      ]);

      $visit = Visit::findOrFail($id);
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->dateTime = $request->input('dateTime');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->save();

      return redirect()->route('admin.visits.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $visit = Visit::findOrFail($id);
      $visit->delete();

      return redirect()->route('admin.visits.index');
    }
}
