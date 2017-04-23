@extends('layout/admin')

@section('content2')
  <h1>Showing {{ $user->name }}</h1>

    <div class="jumbotron">
        <h2>{{ $user->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $user->email }}<br>
            <strong>Username:</strong> {{ $user->username }}<br>
            <strong>Role:</strong> {{ $user->role->name }}<br>
            <strong>Team:</strong> {{ $user->team->name }}<br>
            <strong>Flag:</strong> {{ $user->flag }}
        </p>
    </div>

  </div>
@stop
