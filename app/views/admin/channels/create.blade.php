@extends('layout/admin')

@section('content2')
  <h1>Create a channel</h1>

  {{ HTML::ul($errors->all()) }}

  {{ Form::open(array('url' => 'admin/channels')) }}

      <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Create the channel!', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

  </div>
@stop
