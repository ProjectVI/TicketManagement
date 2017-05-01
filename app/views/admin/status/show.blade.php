@extends('layout/admin')

@section('content2')
    <div class="jumbotron">
        <h2>{{ $status->name }}</h2>
        <p>
            <strong>Flag:</strong> {{ $status->flag }}
        </p>
    </div>

  </div>
@stop
