@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
              Patient: {{ $patient->user->name }}
              <br>
              ID: {{ $patient->id }}
            </div>

            <div class="class-body">
              <table class="table table-hover">
                <tbody>
                        <tr>
                            <td>Doctor Name</td>
                            <td>{{ $patient->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $patient->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $patient->user->address }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $patient->user->phone }}</td>
                        </tr>
                        <tr>
                            <td>Insurance</td>
                            <td>{{ $patient->insurance }}</td>
                        </tr>
                        <tr>
                            <td>Insurance Company</td>
                            <td>{{ $patient->insurance_company }}</td>
                        </tr>
                        <tr>
                            <td>Policy Number</td>
                            <td>{{ $patient->policy_number }}</td>
                        </tr>
              </tbody>
            </table>

            <a href="{{ route('admin.patients.index') }}" class="btn btn-default">Back</a>
            <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
            <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="form-control btn btn-danger">Delete</a>
          </form>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>

    {{-- <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
              Visits
            </div>

            <div class="class-body">
              <table class="table table-hover">
                <tbody>
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
            <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
            <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="form-control btn btn-danger">Delete</a>
          </form>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
@endsection
