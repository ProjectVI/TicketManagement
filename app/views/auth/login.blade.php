@extends('layout/layout')

@section('content')
  <div class="col-md-12" style="text-align:center;padding-top:100px">
    <img src="{{ asset('assets/images/Logo-THNIC-Flat-01.png') }}" style="width:50%" class="img-rounded">
    {{ HTML::ul($errors->all()) }}
    {{ Form::open(array('url' => 'auth/login','class' => 'form-horizontal')) }}
    <!-- if there are login errors, show them here -->
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="form-group">
            {{ $errors->first('username') }}
            {{ $errors->first('password') }}
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="form-group">
          {{ Form::label('username', 'Username', array('class'=>'col-md-3 control-label')) }}
          <div class="col-md-9">
          {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('password', 'Password', array('class'=>'col-md-3 control-label')) }}
          <div class="col-md-9">
            {{ Form::password('password', array('class' => 'form-control')) }}
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="form-group text-center">
            {{ Form::submit('Submit!', array('class'=>'btn btn-primary','style' => 'width:95%')) }}
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    {{ Form::close() }}
  </div>
@stop
