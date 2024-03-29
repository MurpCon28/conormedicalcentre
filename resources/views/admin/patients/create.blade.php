@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
              Add new patient
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
              <form method="POST" action="{{ route('admin.patients.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="name">Patient Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                  <label for="insurance">Insurance (Yes/No)</label>
                  {{-- <select name="insurance">
                      <option value="insurance">Yes</option>
                      <option value="insurance">No</option>
                  </select> --}}
                  <input type="text" class="form-control" id="insurance" name="insurance" value="{{ old('insurance') }}">
                </div>
                <div class="form-group">
                  <label for="insurance_company">Insurance Company (If none type None)</label>
                  <input type="text" class="form-control" id="insurance_company" name="insurance_company" value="{{ old('insurance_company') }}">
                </div>
                <div class="form-group">
                  <label for="policy_number">Policy Number (If none type None)</label>
                  <input type="text" class="form-control" id="policy_number" name="policy_number" value="{{ old('policy_number') }}">
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
