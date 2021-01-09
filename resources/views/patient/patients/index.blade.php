@extends('patient.layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

          <p id="alert-message" class="alert collapse"></p>

          <div class="card">
            <div class="card-header">
              Patients
            </div>

            <div class="card-body">
              @if (count($patients) == 0)
                <p>There are no patients!</p>
              @else
                <table id="table-books" class="table table-hover">
                  <thead>
                    <th>Patient Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Insurance</th>
                    <th>Insurance Company</th>
                    <th>Policy Number</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
              @foreach ($patients as $patient)
                    <tr data-id="{{ $patient->id }}">
                      <td>{{ $patient->user->name }}</td>
                      <td>{{ $patient->user->email }}</td>
                      <td>{{ $patient->user->address }}</td>
                      <td>{{ $patient->user->phone }}</td>
                      <td>{{ $patient->insurance }}</td>
                      <td>{{ $patient->insurance_company }}</td>
                      <td>{{ $patient->policy_number }}</td>
                      <td>
                          <a href="{{ route('patient.patients.show', $patient->id) }}" class="btn btn-primary">View</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
