@extends('layout/layout')
@include('layout/nav')

@section('content')
<!-- search criteria -->
<div class="col-md-12">
    <h1>Tickets</h1><br>
    @if (Session::has('message'))
      <div class="col-md-12">
        <div class="alert alert-info">{{ Session::get('message') }}</div>
      </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading ">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1">Search Criteria</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
                {{ Form::open(array('url' => 'dashboard/tickets/search','class' => 'form-horizontal')) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                              {{ Form::label('subject', 'Subject', array('class'=>'col-md-2 control-label')) }}
                            <div class="col-md-10">
                              {{-- Form::select('subject', array_merge(['' => 'Please Select'], $subjects), null, array('class' => 'form-control')) --}}
                              {{ Form::select('subject', $subjects, null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::label('channel', 'Channel', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              {{ Form::select('channel', $channels, null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                              {{ Form::label('channel_id', 'Channel ID', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              {{ Form::text('channel_info', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('domain', 'Domain', array('class'=>'col-md-2 control-label')) }}
                            <div class="col-md-10">
                              {{ Form::text('domain', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::label('status', 'Status', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              {{ Form::select('status', $status, null, ['class' => 'form-control' ]) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::label('fax_id', 'Fax ID', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              {{ Form::text('fax_id', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('problem', 'Problem', array('class'=>'col-md-2 control-label')) }}
                            <div class="col-md-10">
                              {{ Form::text('problem', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::label('user', 'User', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              {{ Form::text('user', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::label('team', 'Team', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              {{ Form::select('team', $teams,  null, ['class' => 'form-control' ]) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('organization', 'Organization', array('class'=>'col-md-2 control-label')) }}
                            <div class="col-md-10">
                              {{ Form::text('organization', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding:0">
                        <div class="form-group">
                            {{ Form::label('created_from', 'Created Date', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              <input class="form-control" type="date" name="created_from" id="created_from"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ Form::label('created_to', 'to', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              <input class="form-control" type="date" name="created_to" id="created_to"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    {{ Form::reset('Clear', array('class' => 'btn btn-default')) }}
                    {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12" style="text-align:right">
    <button style="margin-left:20px" type="button" class="btn btn-primary openpanel accordion-toggle pull-right" data-toggle="collapse" data-parent="#accordion" href="#panel3">+ Insert</button>
    <button id="button" class="btn btn-md btn-warning clearfix pull-right"><span class="fa fa-download"></span>Export CSV</button>
</div>
<!-- operation: form -->
<div class="col-md-12">
  <div class="panel panel-default">
    <div id="panel3" class="panel-collapse collapse">
      <div class="panel-body">
          {{ Form::open(array('url' => 'dashboard/tickets')) }}

          <h2 class="panel-title">
              <b>Ticket Form</b>
          </h2>
          <!-- table body -->

          <br>
          <div class="row">
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('subject', 'Subject') }}
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group">
                      {{ Form::select('subject', $subjects, null, ['class' => 'form-control' ]) }}
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('channel', 'Channel') }}
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      {{ Form::select('channel', $channels, null, ['class' => 'form-control' ]) }}
                  </div>
              </div>
              <div class="col-md-1" style="padding-right:0">
                  <div class="form-group">
                      {{ Form::label('channelid', 'Channel ID') }}
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      {{ Form::text('channel_info', '', array('class' => 'form-control', 'placeholder' => 'Channel ID')) }}
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('domain', 'Domain') }}
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group">
                      {{ Form::text('domain', '', array('class' => 'form-control', 'placeholder' => 'Domain')) }}
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('status', 'Status') }}
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      {{ Form::select('status', $status, null, ['class' => 'form-control' ]) }}
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('fax_id', 'Fax ID') }}
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      {{ Form::text('fax_id', '', array('class' => 'form-control', 'placeholder' => 'Fax ID')) }}
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('problem', 'Problem') }}
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group">
                      {{ Form::text('problem', '', array('class' => 'form-control', 'placeholder' => 'Problem')) }}
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('contact_name', 'Contact') }}
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group">
                      {{ Form::text('contact_name', '', array('class' => 'form-control', 'placeholder' => 'Contact Name')) }}
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('organization', 'Organization') }}
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group">
                      {{ Form::text('organization', '', array('class' => 'form-control', 'placeholder' => 'Organization')) }}
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('contact_phone', 'Phone') }}
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      {{ Form::text('contact_phone', '', array('class' => 'form-control', 'placeholder' => 'Phone')) }}
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('contact_email', 'Mail') }}
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      {{ Form::text('contact_email', '', array('class' => 'form-control', 'placeholder' => 'Mail')) }}
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('answer', 'Answer') }}
                      {{ Form::label('answer', 'Resolution') }}
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group">
                      {{ Form::textarea('answer', '', array('class' => 'form-control', 'placeholder' => 'Answer/Resolution')) }}
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-group">
                      {{ Form::label('remark', 'Suggestion') }}
                      {{ Form::label('remark', 'Remark') }}
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group">
                      {{ Form::textarea('remark', '', array('class' => 'form-control', 'placeholder' => 'Suggestion/Remark')) }}
                  </div>
              </div>

            <div class="form-group text-center">
                {{ Form::reset('Clear', array('class' => 'btn btn-default')) }}
                <button type="button" class="btn btn-default closepanel accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel3">Hide</button>
                {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
            </div>

            {{ Form::close() }}
          </div>
      </div>
    </div>
  </div>
</div>
<!-- operation: view -->
<div class="col-md-12" style="padding-top:20px">
  <table id="tickets_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>Created at</td>
            <td>Subject</td>
            <td>Problem</td>
            <td>Status</td>
            <td>Staff</td>
            <td>Fax ID</td>
            <td>Channel</td>
            <td>Channel ID</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($tickets as $key => $ticket)
        <tr>
            <td>{{ $ticket->created_at }}</td>
            <td>{{ $ticket->subject->name }}</td>
            <td>{{ $ticket->problem }}</td>
            <td>{{ $ticket->status->name }}</td>
            <td>{{ $ticket->created_by()->first()->name }}</td>
            <td>{{ $ticket->fax_id }}</td>
            <td>{{ $ticket->channel->name }}</td>
            <td>{{ $ticket->channel_info }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ route('tickets.show', $ticket->id) }}">Show</a>
                <a class="btn btn-small btn-info" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
                @if ($ticket->flag == 'A')
                    <a class="btn btn-small btn-danger" href="{{ route('tickets.ban', $ticket->id) }}">Inactive</a>
                @else
                    <a class="btn btn-small btn-danger" href="{{ route('tickets.unban', $ticket->id) }}">Active</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
</div>
<!-- search result -->
@stop
