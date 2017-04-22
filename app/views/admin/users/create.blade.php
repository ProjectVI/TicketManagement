@extends('layout/layout')
@extends('layout/nav')

@section('content')
  <h1>Create a user</h1>

  {{ HTML::ul($errors->all()) }}

  {{ Form::open(array('url' => 'admin/users')) }}

      <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('email', 'Email') }}
          {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('username', 'Username') }}
          {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('password', 'Password') }}
          {{ Form::password('password', array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Create the user!', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

  </div>
@stop
