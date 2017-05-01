@extends('layout/admin')

@section('content2')
    <div class="jumbotron">
        <h2>{{ $subject->name }}</h2>
        <p>
            <strong>Flag:</strong> {{ $subject->flag }}
        </p>
    </div>

  </div>
@stop
