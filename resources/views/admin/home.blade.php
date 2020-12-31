@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as an admin!') }}
                    <br>
                    <br>
                    <b>Hi, {{ Auth::user()->name }}</b>
                    <br>
                    <b>Email:</b> {{ Auth::user()->email }}
                    <br>
                    <b>Address:</b> {{ Auth::user()->address }}
                    <br>
                    <b>Phone:</b> {{ Auth::user()->phone }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
