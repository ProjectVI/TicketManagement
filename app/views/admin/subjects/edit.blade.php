@extends('layout/admin')
@section('content2')
  <h1>Edit {{ $subject->name }}</h1>

  {{ HTML::ul($errors->all()) }}

  {{ Form::model($subject, array('route' => array('subjects.update', $subject->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the subject!', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

  </div>
@stop
