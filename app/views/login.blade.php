@extends('layout')

@section('content')
    {{ Form::open(array('url' => 'login')) }}
    <h1>Login</h1>

    <!-- if there are login errors, show them here -->
    <p>
        {{ $errors->first('username') }}
        {{ $errors->first('password') }}
    </p>

    <p>
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', Input::old('username'), array('placeholder' => 'awesome')) }}
    </p>

    <p>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
    </p>

    <p>{{ Form::submit('Submit!') }}</p>
    {{ Form::close() }}
@stop
