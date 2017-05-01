@extends('layout/admin')

@section('content2')
    <div class="col-md-12">
      <h1>Subject Management</h1>
    </div>
    @if (Session::has('message'))
      <div class="col-md-12">
        <div class="alert alert-info">{{ Session::get('message') }}</div>
      </div>
    @endif
    <div class="col-md-3" style="padding-top:20px">
      <a class="btn btn-success" href="{{ URL::to('admin/subjects/create') }}">+ New subject</a>
    </div>
    <div class="col-md-9" style="padding-top:20px"></div>
    <div class="col-md-12" style="padding-top:20px">
      <table id="subjects_table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Create Date</td>
                <td>Update Date</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach($subjects as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>
                <td>{{ $value->flag }}</td>
                <td>
                    <!-- <a class="btn btn-small btn-success" href="{{ route('subjects.show', $value->id) }}">S</a> -->
                    <a class="btn btn-small btn-info" href="{{ route('subjects.edit', $value->id) }}">E</a>
                    @if ($value->flag == 'A')
                        <a class="btn btn-small btn-danger" href="{{ route('subjects.ban', $value->id) }}">B</a>
                    @else
                        <a class="btn btn-small btn-danger" href="{{ route('subjects.unban', $value->id) }}">U</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
@stop
