@extends('layout/admin')

@section('content2')
    <div class="jumbotron">
        <h2>{{ $channel->name }}</h2>
        <p>
            <strong>Flag:</strong> {{ $channel->flag }}
        </p>
    </div>

  </div>
@stop
