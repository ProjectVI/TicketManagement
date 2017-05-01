@extends('layout/admin')
@section('content2')
  <h1>Edit {{ $team->name }}</h1>

  {{ HTML::ul($errors->all()) }}

  {{ Form::model($team, array('route' => array('teams.update', $team->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the team!', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

  </div>
@stop
