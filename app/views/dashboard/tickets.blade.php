@extends('layout/layout')
@include('layout/nav')

@section('content')
<!-- search criteria -->
<div class="row">
  @if (Session::has('message'))
    <div class="col-md-12">
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    </div>
  @endif
</div>
<div class="col-md-12">
    <h1>Tickets</h1><br>

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
                              {{ Form::select('subject', array_merge(['' => 'Select'], $subjects), null, array('class' => 'form-control')) }}
                              {{-- Form::select('subject', $subjects, null, array('class' => 'form-control')) --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                              {{ Form::label('channel', 'Channel', array('class'=>'col-md-5 control-label')) }}
                            <div class="col-md-7">
                              {{ Form::select('channel', array_merge(['' => 'Select'], $channels), null, array('class' => 'form-control')) }}
                              {{-- Form::select('channel', $channels, null, array('class' => 'form-control')) --}}
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
                              {{ Form::select('status', array_merge(['' => 'Select'], $status), null, array('class' => 'form-control')) }}
                              {{-- Form::select('status', $status, null, ['class' => 'form-control' ]) --}}
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
                              {{ Form::select('team', array_merge(['' => 'Select'], $teams), null, array('class' => 'form-control')) }}
                              {{-- Form::select('team', $teams,  null, ['class' => 'form-control' ]) --}}
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
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('created_from', 'Created Date', array('class'=>'col-md-3 control-label')) }}
                            <div class="col-md-4">
                              <input class="form-control" type="date" name="created_from" id="created_from"/>
                            </div>
                            {{ Form::label('created_to', 'to', array('class'=>'col-md-1 control-label')) }}
                            <div class="col-md-4">
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
    {{ Form::open(array('route' => array('tickets.export', $tickets))) }}
    <button type="submit" class="btn btn-md btn-warning clearfix pull-right">Export CSV</button>
    {{ Form::close() }}

</div>
<!-- operation: form -->
<div class="col-md-12">
  <div class="panel panel-default">
    <div id="panel3" class="panel-collapse collapse">
      <div class="panel-body">
          {{ Form::open(array('url' => 'dashboard/tickets')) }}
          <h2 class="panel-title" id="title">
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
                {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
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
            <td style="display:none;">ID</td>
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
            <td style="display:none;">{{ $ticket->id }}</td>
            <td>{{ $ticket->created_at }}</td>
            <td>{{ $ticket->subject->name }}</td>
            <td>{{ $ticket->problem }}</td>
            <td>{{ $ticket->status->name }}</td>
            <td>{{ $ticket->created_by()->first()->username }}</td>
            <td><a href="https://faxth.thnic.co.th/fax/show_fax.php?faxid={{ $ticket->fax_id }}">{{ $ticket->fax_id }}</a></td>
            <td>{{ $ticket->channel->name }}</td>
            @if ($ticket->channel->name == 'Chat')
              <td><a href="https://chat.thnic.co.th/index.php/site_admin/chat/single/{{ $ticket->channel_info }}">{{ $ticket->channel_info }}</a></td>
            @elseif ($ticket->channel->name == 'Email')
              <td><a href="https://mailsys.thnic.co.th/supportcenter/client/index.php#{{ $ticket->channel_info }}">{{ $ticket->channel_info }}</a></td>
            @else
              <td>{{ $ticket->channel_info }}</td>
            @endif
            <td>
                {{ Form::open(['id' => "delete_".$ticket->id,'method' => 'GET', 'style' => 'margin:0', 'route' => ['tickets.ban', $ticket->id]]) }}
                    <a class="details-control btn btn-small btn-primary"><i class="fa fa-info" aria-hidden="true"></i></a>
                    <a id="{{ $ticket->id }}" class="edit-ticket btn btn-small btn-info" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a onclick="confirmDelete({{ $ticket->id }})" class="delete-ticket btn btn-small btn-danger" ><i class="fa fa-minus" aria-hidden="true"></i></a>
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
</div>
<!-- search result -->
<script>
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table class="table table-bordered" cellpadding="5" cellspacing="0" border="0">'+
            '<tr>'+
                '<td>Subject: </td>'+
                '<td>'+d.subject.name+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Domain: </td>'+
                '<td>'+d.domain+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Problem: </td>'+
                '<td>'+d.problem+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Organization: </td>'+
                '<td>'+d.organization+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Channel: </td>'+
                '<td>'+d.channel.name+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Channel ID: </td>'+
                '<td>'+d.channel_info+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Status: </td>'+
                '<td>'+d.status.name+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Fax ID: </td>'+
                '<td>'+d.fax_id+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Contact: </td>'+
                '<td>'+d.contact_name+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Phone: </td>'+
                '<td>'+d.contact_phone+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Mail: </td>'+
                '<td>'+d.contact_email+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Answer: </td>'+
                '<td>'+d.answer+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Remark: </td>'+
                '<td>'+d.remark+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Created_by: </td>'+
                '<td>'+d.created_by+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Updated_by: </td>'+
                '<td>'+d.updated_by+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Created_at: </td>'+
                '<td>'+d.created_at+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Updated_at: </td>'+
                '<td>'+d.updated_at+'</td>'+
            '</tr>'+
        '</table>';
    }
    function confirmDelete(id)
    {

        $.confirm({
          title: 'Delete Ticket',
          content: "This ticket will be deleted and you'll no longer be able to find it.",
          buttons: {
              delete: function () {
                  $('#delete_'+id).submit();
              },
              cancel: function () {

              },
          },
          onContentReady: function () {
              $("div .jconfirm-box.jconfirm-hilight-shake.jconfirm-type-default.jconfirm-type-animated").css('margin-top','50%');
          },
        });

    }
    $(document).ready(function() {
        $('tbody, a, .ticket').on('click', function () {
          var id = this.id;
          $.ajax({
             url: '/dashboard/tickets/'+id+'/json',
             type:'GET',
             success:function(data){
                 var obj = JSON.parse(data);
                 $("#panel3 h2").html("<b>Ticket Form (edit)</b>");
                 $("#panel3, select #subject").val(obj.subject);
                 $("#panel3, select #channel").val(obj.channel);
                 $("#panel3, select #status").val(obj.status);
                 $("#panel3, [name='domain']").val(obj.domain);
                 $("#panel3, [name='problem']").val(obj.problem);
                 $("#panel3, [name='organization']").val(obj.organization);
                 $("#panel3, [name='answer']").val(obj.answer);
                 $("#panel3, [name='fax_id']").val(obj.fax_id);
                 $("#panel3, [name='channel_info']").val(obj.channel_info);
                 $("#panel3, [name='contact_name']").val(obj.contact_name);
                 $("#panel3, [name='contact_phone']").val(obj.contact_phone);
                 $("#panel3, [name='contact_email']").val(obj.contact_email);
                 $("#panel3, [name='remark']").val(obj.remark);

                //  $("#panel3, form").attr("method", "PUT");
                 $("#panel3, form").attr("action", "/dashboard/tickets/"+obj.id+"/update");

                 $('#panel3').collapse('show');
                 $('#panel3').goTo();
             }
           });
        });
        var table = $('#tickets_table').DataTable();
        $('#tickets_table tbody').on('click', 'a.details-control', function () {
             var tr = $(this).closest('tr');
             var row = table.row( tr );
             var id = row.data()[0];
             var ticket = {{ json_encode($tickets) }};
             if ( row.child.isShown() ) {
                 row.child.hide();
                 tr.removeClass('shown');
             }
             else {
                 row.child( format(ticket[id]) ).show();
                 tr.addClass('shown');
             }
         });
    });
</script>
@stop
<!-- search criteria -->
