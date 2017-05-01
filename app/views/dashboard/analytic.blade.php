@extends('layout/layout')
@include('layout/nav')

@section('content')
<!-- search criteria -->
<div class="row">
  @if (Session::has('message'))
    <div class="col-md-12">
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    </div>
  @endif
</div>
<div class="row">
  <div class="col-md-12">
      <h1>Analytic</h1>
  </div>
</div>
@stop
<!-- search criteria -->
