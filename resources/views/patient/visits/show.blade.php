@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
              Visit: {{ $visit->patientName }}
            </div>

            <div class="class-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                      <tr>
                          <td>Patient Name</td>
                          <td>{{ $visit->patient->user->name }}</td>
                      </tr>
                      <tr>
                          <td>Doctor Name</td>
                          <td>{{ $visit->doctor->user->name }}</td>
                      </tr>
                      <tr>
                          <td>Date & Time</td>
                          <td>{{ $visit->dateTime }}</td>
                      </tr>
                      <tr>
                          <td>Duration in Hours</td>
                          <td>{{ $visit->duration }}</td>
                      </tr>
                      <tr>
                          <td>Cost in Euros</td>
                          <td>{{ $visit->cost }}</td>
                      </tr>
              </tbody>
            </table>

            <a href="{{ route('patient.visits.index') }}" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
