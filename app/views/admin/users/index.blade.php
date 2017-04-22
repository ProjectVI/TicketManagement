@extends('layout/layout')
@extends('layout/nav')

@section('content')
<a href="{{ URL::to('admin/users/create') }}">Create a user</a>
<h1>All the users</h1>

@if (Session::has('message'))
  <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
  <thead>
      <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Username</td>
          <td>Actions</td>
      </tr>
  </thead>
  <tbody>
  @foreach($users as $key => $value)
      <tr>
          <td>{{ $value->id }}</td>
          <td>{{ $value->name }}</td>
          <td>{{ $value->email }}</td>
          <td>{{ $value->username }}</td>
          <td>
              <a class="btn btn-small btn-success" href="{{ URL::to('admin/users/' . $value->id) }}">Show this user</a>
              <!-- <a class="btn btn-small btn-info" href="{{ URL::to('admin/users/' . $value->id . '/edit') }}">Edit this Nerd</a> -->
          </td>
      </tr>
  @endforeach
  </tbody>
</table>
@stop
