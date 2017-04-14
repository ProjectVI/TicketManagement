@extends('layout')

@section('content')
    <h1>Administration</h1>

    <div class="form-group">
        {{ HTML::link('/register', 'Register', array('class' => 'btn btn-warning')) }}
    </div>


@stop