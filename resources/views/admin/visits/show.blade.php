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

            <a href="{{ route('admin.visits.index') }}" class="btn btn-default">Back</a>
            <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
            <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="form-control btn btn-danger">Delete</a>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
