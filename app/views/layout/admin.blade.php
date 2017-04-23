@extends('layout/layout')
@include('layout/nav')

@section('content')
  <div class="col-sm-2">
      @include('layout/sidebar')
  </div>
  <div class="col-sm-10">
      @yield('content2')
  </div>
@stop
