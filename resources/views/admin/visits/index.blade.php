@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

          <p id="alert-message" class="alert collapse"></p>

          <div class="card">
            <div class="card-header">
              Visits
              <a href="{{ route('admin.visits.create') }}" class="btn btn-primary float-right">Add</a>
            </div>

            <div class="card-body">
              @if (count($visits) == 0)
                <p>There were no visits!</p>
              @else
                <table id="table-books" class="table table-hover">
                  <thead>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Date & Time</th>
                    <th>Duration in Hours</th>
                    <th>Cost in Euros</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
              @foreach ($visits as $visit)
                    <tr data-id="{{ $visit->id }}">
                      <td>{{ $visit->patient->user->name }}</td>
                      <td>{{ $visit->doctor->user->name }}</td>
                      <td>{{ $visit->dateTime }}</td>
                      <td>{{ $visit->duration }}</td>
                      <td>{{ $visit->cost }}</td>
                      <td>
                          <a href="{{ route('admin.visits.show', $visit->id) }}" class="btn btn-primary">View</a>
                          <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                          <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
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
