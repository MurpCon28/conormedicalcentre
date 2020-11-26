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
                            <td>Patient Name</td>
                            <td>{{ $visit->patientName }}</td>
                        </tr>
                        <tr>
                            <td>Doctor Name</td>
                            <td>{{ $visit->doctorName }}</td>
                        </tr>
                        <tr>
                            <td>Date & Time</td>
                            <td>{{ $visit->dateTime }}</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{ $visit->duration }}</td>
                        </tr>
                        <tr>
                            <td>Cost</td>
                            <td>{{ $visit->cost }}</td>
                        </tr>
              </tbody>
            </table>

            <a href="{{ route('doctor.visits.index') }}" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
