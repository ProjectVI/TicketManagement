@extends('layout')

@section('content')
    <h1>Administration</h1>


    <div class="row">
        <!-- Menu -->
        <div class="col-md-2">
            <div class="panel panel-info">
                <div class="panel-heading ">
                    <h4 class="panel-title">Navigation
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <br>

                    <a href="/admin">User</a><br>
                    <a href="/channel">Channel</a><br>
                    <a href="/subject">Subject</a><br>
                    <a href="/status">Status</a><br>
                    <a href="/team">Team</a><br>

                </div>
            </div>
        </div>
        <!-- Menu end-->

        <!-- Panel User-->
        <div class="col-md-10">
            <div class="panel panel-info">
                <div class="panel-heading ">
                    <h4 class="panel-title">
                        Status
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>

                    <br><br><div class="col-sm-4">

                        {{ HTML::link('/register', '+ New Status', array('class' => 'btn btn-success')) }}
                    </div>
                    <div class="col-sm-8">
                        <form id="searchbox" action="">
                            <input class = "pull-right" id="search" type="text" placeholder="Type here">
                            <input class = "pull-right" id="submit" type="submit" value="Search">

                        </form>
                    </div>

                    <br><br>

                    <div id="collapse2" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="row">

                                <div class="well">
                                    <table class = "table table-striped table-hover data-pagination='true' data-search='true'" >

                                        <!-- table head -->
                                        <thead>

                                        <tr>
                                            <th data-sortable='true'>ID</th>
                                            <th>Status name</th>
                                            <th>Flag</th>
                                            <th>Action</th>
                                        </tr>

                                        </thead>

                                        <tbody>
                                        @foreach($statuses as $status)
                                            <tr>
                                                <td data-sortable='true'>{{ $status->status_id }}</td>
                                                <td>{{ $status->status_name }}</td>
                                                <td>{{ $status->flag }}</td>

                                                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!--Table end-->
                </div>

@stop