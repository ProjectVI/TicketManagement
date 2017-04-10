@extends('layout')

@section('content')
    <h1>Administration</h1>

    <h2>Admin Section</h2>

    {{ HTML::link('logout', 'Logout', array('class' => 'btn btn-warning'))}}
@stop