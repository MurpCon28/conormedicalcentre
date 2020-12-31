@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

          <p id="alert-message" class="alert collapse"></p>

          <div class="card">
            <div class="card-header">
              Doctors
              <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary float-right">Add</a>
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
                    <th>Date Started</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
              @foreach ($doctors as $doctor)
                    <tr data-id="{{ $doctor->id }}">
                      {{-- <td>{{ $doctor->doctor->user->name }}</td> --}}
                      <td>{{ $doctor->name }}</td>
                      <td>{{ $doctor->email }}</td>
                      <td>{{ $doctor->address }}</td>
                      <td>{{ $doctor->phone }}</td>
                      {{-- <td>{{ $doctor->doctor->user->date_started }}</td> --}}
                      <td>
                          <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-primary">View</a>
                          <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                          <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="form-control btn btn-danger">Delete</a>
                        </form>
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
