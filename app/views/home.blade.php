@extends('layout')

<script>
    //button Hide & Insert button
    $(".openpanel").on("click", function() {
        $("#panel3").collapse('show');
    });
    $(".closepanel").on("click", function() {
        $("#panel3").collapse('hide');
    });

    /* ensure any open panels are closed before showing selected */
    $('#accordion').on('show.bs.collapse', function () {
        $('#accordion .in').collapse('hide');
    });
</script>


@section('content')

    <h1>Tickets</h1>

    <!-- search criteria -->
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading ">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">Search Criteria</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    {{ Form::open(array('url' => 'ticketsearch')) }}

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('subject', 'Subject') }}
                                {{ Form::select('select', ['0' => 'Please select', '1' => 'Subject1', '2' => 'Subject2'],  'S', ['class' => 'form-control' ]) }}

                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('channel', 'Channel') }}
                                {{ Form::select('select', ['0' => 'Please select', '1' => 'Email', '2' => 'Chat', '3' => 'Phone'],  'S', ['class' => 'form-control' ]) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('channelid', 'Channel ID') }}
                                {{ Form::text('channelid', '', array('class' => 'form-control', 'placeholder' => 'Channel ID')) }}
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('domain', 'Domain') }}
                                {{ Form::text('domain', '', array('class' => 'form-control', 'placeholder' => 'Domain')) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('status', 'Status') }}
                                {{ Form::select('select', ['0' => 'Please select', '1' => 'Open', '2' => 'Pending', '3' => 'Close(RST)', '4' => 'Close(AR)'],  'S', ['class' => 'form-control' ]) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('faxid', 'Fax ID') }}
                                {{ Form::text('faxid', '', array('class' => 'form-control', 'placeholder' => 'Fax ID')) }}
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('problem', 'Problem') }}
                                {{ Form::text('problem', '', array('class' => 'form-control', 'placeholder' => 'Problem')) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('user', 'User') }}
                                {{ Form::text('user', '', array('class' => 'form-control', 'placeholder' => 'User')) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('team', 'Team') }}
                                {{ Form::select('select', ['0' => 'Please select', '1' => 'RST', '2' => 'AR'],  'S', ['class' => 'form-control' ]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('organization', 'Organization') }}
                                {{ Form::text('organization', '', array('class' => 'form-control', 'placeholder' => 'Organization')) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('created_from', 'Created from') }}
                                {{ Form::text('created_from', '', array('class' => 'form-control', 'placeholder' => 'Created from')) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('created_to', 'Created to') }}
                                {{ Form::text('created_to', '', array('class' => 'form-control', 'placeholder' => 'Created to')) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        {{ Form::submit('Search', array('class' => 'btn btn-default')) }}
                        {{ HTML::link('/', 'Clear', array('class' => 'btn btn-default')) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- operation: form -->
    <div class="col-md-12">
        <div class="panel panel-info">

            <!-- <div id="collapse2" class="panel-collapse collapse"> -->
                <div id="panel3" class="panel-collapse collapse">
                <div class="panel-body">
                    {{ Form::open(array('url' => 'ticketcreate')) }}

                    <h2 class="panel-title">
                        <b>Ticket Form</b>
                    </h2>
                    <!-- table body -->

                    <br>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('subject', 'Subject') }}
                                {{ Form::select('select', ['0' => 'Please select', '1' => 'Subject1', '2' => 'Subject2'],  'S', ['class' => 'form-control' ]) }}
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('channel', 'Channel') }}
                                {{ Form::select('select', ['0' => 'Please select', '1' => 'Email', '2' => 'Chat', '3' => 'Phone'],  'S', ['class' => 'form-control' ]) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('channelid', 'Channel ID') }}
                                {{ Form::text('channelid', '', array('class' => 'form-control', 'placeholder' => 'Channel ID')) }}
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('domain', 'Domain') }}
                                {{ Form::text('domain', '', array('class' => 'form-control', 'placeholder' => 'Domain')) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('status', 'Status') }}
                                {{ Form::select('select', ['0' => 'Please select', '1' => 'Open', '2' => 'Pending', '3' => 'Close(RST)', '4' => 'Close(AR)'],  'S', ['class' => 'form-control' ]) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('faxid', 'Fax ID') }}
                                {{ Form::text('faxid', '', array('class' => 'form-control', 'placeholder' => 'Fax ID')) }}
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('problem', 'Problem') }}
                                {{ Form::text('problem', '', array('class' => 'form-control', 'placeholder' => 'Problem')) }}
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('contact_name', 'Contact Name') }}
                                {{ Form::text('contact_name', '', array('class' => 'form-control', 'placeholder' => 'Contact Name')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('organization', 'Organization') }}
                                {{ Form::text('organization', '', array('class' => 'form-control', 'placeholder' => 'Organization')) }}
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('contact_phone', 'Phone') }}
                                {{ Form::text('contact_phone', '', array('class' => 'form-control', 'placeholder' => 'Phone')) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('contact_mail', 'Mail') }}
                                {{ Form::text('contact_mail', '', array('class' => 'form-control', 'placeholder' => 'Mail')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('answer', 'Answer/Resolution') }}
                                {{ Form::text('answer', '', array('class' => 'form-control', 'placeholder' => 'Answer/Resolution')) }}
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                {{ Form::label('remark', 'Suggestion/Remark') }}
                                {{ Form::text('remark', '', array('class' => 'form-control', 'placeholder' => 'Suggestion/Remark')) }}
                            </div>
                        </div>
                    <div class="form-group text-center">
                        <!-- <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel3">Panel 2</a> -->


                        {{ Form::submit('Create', array('class' => 'btn btn-default')) }}
                        <button type="button" class="btn btn-default closepanel accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel3">Hide</button>
                        {{ HTML::link('/', 'Clear', array('class' => 'btn btn-default')) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- operation: view -->
        <div class="col-md-12">
            <div class="panel panel-info">

                <div class="panel-heading clearfix">
                    <h4 class="panel-title" style="padding-top: 7.5px;">
                        <a data-toggle="collapse" href="#collapse2" class="pull-left">Search Result</a>
                        <button type="button" class="btn btn-primary openpanel accordion-toggle pull-right" data-toggle="collapse" data-parent="#accordion" href="#panel3">Insert</button>
                        <button id="button" class="btn btn-md btn-warning clearfix pull-right"><span class="fa fa-download"></span> Export CSV</button>
                        <br>
                    </h4>
                </div>

                <div id="collapse2" class="panel-collapse collapse in">
                    <div class="panel-body">

                        <div class="row">

                            <div class="well">
                                 <table class = "table table-striped table-hover data-pagination='true' data-search='true'" >

                                    <!-- table head -->
                                    <thead>

                                        <tr>
                                            <th data-sortable='true'>Create at</th>
                                            <th>Subject</th>
                                            <th data-sortable='true'>Problem</th>
                                            <th>Status</th>
                                            <th>Staff</th>
                                            <th>Fax ID</th>
                                            <th>Channel</th>
                                            <th>Channel ID</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>

                                        <tbody>
                                        @foreach($tickets as $ticket)
                                            <tr>
                                                <td data-sortable='true'>{{ $ticket->created_at }}</td>
                                                <td>{{ $ticket->subject }}</td>
                                                <td data-sortable='true'>{{ $ticket->problem }}</td>
                                                <td>{{ $ticket->status }}</td>
                                                <td>{{ $ticket->firstname }}</td>
                                                <td>{{ $ticket->fax_id }}</td>
                                                <td>{{ $ticket->channel_id }}</td>
                                                <td>{{ $ticket->channel }}</td>
                                                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                                            </tr>
                                        @endforeach

                                        <!-- not show but data can be exported
                                        <th style="display: none">Update at</th>
                                        <th style="display: none">Ticket ID</th>
                                        <th style="display: none">domain</th>
                                        <th style="display: none">organization</th>
                                        <th style="display: none">answer</th>
                                        <th style="display: none">remark</th>
                                        <th style="display: none">contact_name</th>
                                        <th style="display: none">contact_phone</th>
                                        <th style="display: none">contact_email</th>
                                        -->

                                        <!--
                                        <tr>
                                            <th data-field="name">Name</th>
                                            <th data-field="stargazers_count">Stars</th>
                                            <th data-field="forks_count">Forks</th>
                                            <th data-field="description">Description</th>
                                        </tr>
                                        -->
                                        </tbody>

                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- search result -->


@stop
