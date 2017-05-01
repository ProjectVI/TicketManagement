@extends('layout/admin')

@section('content2')
  <h1>Create a team</h1>

  {{ HTML::ul($errors->all()) }}

  {{ Form::open(array('url' => 'admin/teams')) }}

      <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Create the team!', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

  </div>
@stop
