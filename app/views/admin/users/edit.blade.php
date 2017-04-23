@extends('layout/admin')
@section('content2')
  <h1>Edit {{ $user->name }}</h1>

  {{ HTML::ul($errors->all()) }}

  {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', null, array('class' => 'form-control','readonly')) }}
    </div>

    <div class="form-group">
      {{ Form::label('password', 'Password') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('role', 'Role') }}
      {{ Form::select('role', $roles, $user->role->id, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      {{ Form::label('team', 'Team') }}
      {{ Form::select('team', $teams, $user->team->id, array('class' => 'form-control'))}}
    </div>

    {{ Form::submit('Edit the user!', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

  </div>
@stop
