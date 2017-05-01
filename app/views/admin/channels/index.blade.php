@extends('layout/admin')

@section('content2')
    <div class="col-md-12">
      <h1>Channel Management</h1>
    </div>
    @if (Session::has('message'))
      <div class="col-md-12">
        <div class="alert alert-info">{{ Session::get('message') }}</div>
      </div>
    @endif
    <div class="col-md-3" style="padding-top:20px">
      <a class="btn btn-success" href="{{ URL::to('admin/channels/create') }}">+ New channel</a>
    </div>
    <div class="col-md-9" style="padding-top:20px"></div>
    <div class="col-md-12" style="padding-top:20px">
      <table id="channels_table" class="table table-striped table-bordered">
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
        @foreach($channels as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>
                <td>{{ $value->flag }}</td>
                <td>
                    <!-- <a class="btn btn-small btn-success" href="{{ route('channels.show', $value->id) }}">S</a> -->
                    <a class="btn btn-small btn-info" href="{{ route('channels.edit', $value->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    @if ($value->flag == 'A')
                        <a class="btn btn-small btn-danger" href="{{ route('channels.ban', $value->id) }}"><i class="fa fa-minus" aria-hidden="true"></i></a>
                    @else
                        <a class="btn btn-small btn-success" href="{{ route('channels.unban', $value->id) }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
@stop