@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
              Add new visit
            </div>

            <div class="class-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form method="POST" action="{{ route('admin.visits.update', $visit->id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label for="patientName">Patient Name</label>
                  <input type="text" class="form-control" id="patientName" name="patientName" value="{{ old('patientName', $visit->patientName) }}">
                </div>
                <div class="form-group">
                  <label for="doctorName">Doctor Name</label>
                  <input type="text" class="form-control" id="doctorName" name="doctorName" value="{{ old('doctorName', $visit->doctorName) }}">
                </div>
                <div class="form-group">
                  <label for="dateTime">Date Time</label>
                  <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" value="{{ old('dateTime', $visit->dateTime) }}">
                </div>
                <div class="form-group">
                  <label for="duration">Duration in Hours</label>
                  <input type="text" class="form-control" id="durdurationaton" name="duration" value="{{ old('duration', $visit->duration) }}">
                </div>
                <div class="form-group">
                  <label for="cost">Cost</label>
                  <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost', $visit->cost) }}">
                </div>
                <div class="float-right">
                  <a href="{{ route('admin.visits.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
