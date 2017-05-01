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
      <h1>Analytics</h1>
      {{ $a1 }}
      {{ $a2 }}
      {{ $a3 }}
      {{ $a4 }}
      {{ $a5 }}
      {{ $a6 }}
  </div>
</div>
@stop
<!-- search criteria -->
