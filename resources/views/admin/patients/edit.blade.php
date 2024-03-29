@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
              Edit Patient
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
              <form method="POST" action="{{ route('admin.patients.update', $patient->id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label for="patient">Patient Name</label>
                  <input type="text" class="form-control" id="patient" name="patient" value="{{ old('patient', $patient->user->name) }}">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" value="{{ old('password', $patient->user->password) }}">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $patient->user->email) }}">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $patient->user->address) }}">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $patient->user->phone) }}">
                </div>
                <div class="form-group">
                  <label for="insurance">Insurance (Yes/No)</label>
                  <input type="text" class="form-control" id="insurance" name="insurance" value="{{ old('insurance', $patient->insurance) }}">
                </div>
                <div class="form-group">
                  <label for="insurance_company">Insurance Company (If none type None)</label>
                  <input type="text" class="form-control" id="insurance_company" name="insurance_company" value="{{ old('insurance_company', $patient->insurance_company) }}">
                </div>
                <div class="form-group">
                  <label for="policy_number">Policy Number (If none type None)</label>
                  <input type="text" class="form-control" id="policy_number" name="policy_number" value="{{ old('policy_number', $patient->policy_number) }}">
                </div>
                <div class="float-right">
                  <a href="{{ route('admin.patients.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
