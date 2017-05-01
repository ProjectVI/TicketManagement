@extends('layout/admin')

@section('content2')
    <div class="jumbotron">
        <h2>{{ $team->name }}</h2>
        <p>
            <strong>Flag:</strong> {{ $team->flag }}
        </p>
    </div>

  </div>
@stop
