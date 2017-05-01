@extends('layout/admin')
@section('content2')
  <h1>Edit {{ $status->name }}</h1>

  {{ HTML::ul($errors->all()) }}

  {{ Form::model($status, array('route' => array('status.update', $status->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the status!', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

  </div>
@stop
