@extends('layout/admin')
@section('content2')
  <h1>Edit {{ $channel->name }}</h1>

  {{ HTML::ul($errors->all()) }}

  {{ Form::model($channel, array('route' => array('channels.update', $channel->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the channel!', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

  </div>
@stop
