@extends('patient.layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

          <p id="alert-message" class="alert collapse"></p>

          <div class="card">
            <div class="card-header">
              Doctors
            </div>

            <div class="card-body">
              @if (count($doctors) == 0)
                <p>There are no doctors!</p>
              @else
                <table id="table-books" class="table table-hover">
                  <thead>
                    <th>Doctor Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Date Started Working (Y-D-M)</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
              @foreach ($doctors as $doctor)
                    <tr data-id="{{ $doctor->id }}">
                      <td>{{ $doctor->user->name }}</td>
                      <td>{{ $doctor->user->email }}</td>
                      <td>{{ $doctor->user->address }}</td>
                      <td>{{ $doctor->user->phone }}</td>
                      <td> {{ $doctor->date_started  }} </td>
                      <td>
                          <a href="{{ route('patient.doctors.show', $doctor->id) }}" class="btn btn-primary">View</a>
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
