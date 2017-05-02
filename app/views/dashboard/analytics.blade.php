@extends('layout/layout')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        //chart3
        var record3={{ json_encode($chart3) }};
        var data3 = new google.visualization.DataTable();
        data3.addColumn('string', 'teamname');
        data3.addColumn('number', 'count');
        for(var k in record3){
            var v = record3[k];
            data3.addRow([k,v]);
        }
        var options3 = {
            //title: "Today's Team Performance",
            pieHole: 0.3,
            backgroundColor: { fill:'transparent' },
            pieSliceText: 'label',
            legend: 'none'
        };
        var chart3 = new google.visualization.PieChart(document.getElementById('piechart_3'));
        chart3.draw(data3, options3);

        //chart4
        var record4={{ json_encode($chart4) }};
        console.log(record4);
        var data4 = new google.visualization.DataTable();
        data4.addColumn('string', 'teamname');
        data4.addColumn('number', 'perf');
        for(var k in record4){
            var v = record4[k];
            data4.addRow([k,v]);
        }
        var options4 = {
            //title: "Today's Staff Performance",
            pieHole: 0.3,
            backgroundColor: { fill:'transparent' },
            legend: 'none'
        };
        var chart4 = new google.visualization.PieChart(document.getElementById('piechart_4'));
        chart4.draw(data4, options4);

        //chart5
        var record5={{ json_encode($chart5) }};
        console.log(record5);
        var data5 = new google.visualization.DataTable();
        data5.addColumn('string', 'subjectname');
        data5.addColumn('number', 'count');
        for(var k in record5){
            var v = record5[k];
            data5.addRow([k,v]);
        }
        var options5 = {
            //title: "Today's Ticket Per Subject",
            pieHole: 0.3,
            backgroundColor: { fill:'transparent' },
            legend: 'none'
        };
        var chart5 = new google.visualization.PieChart(document.getElementById('piechart_5'));
        chart5.draw(data5, options5);

//chart6
        var record6={{ json_encode($chart6) }};
        console.log(record6);
        var data6 = new google.visualization.DataTable();
        data6.addColumn('string', 'teamname');
        data6.addColumn('number', 'perf');
        for(var k in record6){
            var v = record6[k];
            data6.addRow([k,v]);
        }
        var options6 = {
            //title: "Today's Ticket Per Channel",
            pieHole: 0.3,
            backgroundColor: { fill:'transparent' },
            legend: 'none'
        };
        var chart6 = new google.visualization.PieChart(document.getElementById('piechart_6'));
        chart6.draw(data6, options6);

    }
</script>

@include('layout/nav')

@section('content')
<!-- search criteria -->
<header class="w3-container" >
    <h3><b><i class="fa fa-dashboard"></i> Overall Statistics</b></h3>
</header>
<div class="w3-row-padding w3-border w3-margin-bottom">
<div class="w3-row-padding w3-margin-bottom" style="padding-top:10px">
    <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
            <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
            <div class="w3-right">
                <h3> {{ $sql1 }}</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Today's Ticket(s)</h4>
        </div>
    </div>
    <div class="w3-quarter">
        <div class="w3-container w3-red w3-padding-16">
            <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
            <div class="w3-right">
                <h3>{{ $sql2 }}</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>All Pending Ticket(s)</h4>
        </div>
    </div>
    <div class="w3-quarter">
        <div class="w3-container w3-teal w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
                <h3>{{ $sql8 }}</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Today's Closed(RST) Ticket</h4>
        </div>
    </div>
    <div class="w3-quarter">
        <div class="w3-container w3-orange w3-text-white w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
                <h3>{{ $sql9 }}</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Today's Closed(AR) Ticket</h4>
        </div>
    </div>
</div>

<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
        <div class="w3-container w3-border w3-padding-16">
            <span class="w3-xlarge">Team Performance</span><br>
            <div id="piechart_3" style="width: 250px; height: 200px;"></div>
        </div>
    </div>
    <div class="w3-quarter">
        <div class="w3-container w3-border w3-padding-16">
            <span class="w3-xlarge">Staff Performance</span><br>
            <div id="piechart_4" style="width: 250px; height: 200px;"></div>
        </div>
    </div>
    <div class="w3-quarter">
        <div class="w3-container w3-border w3-padding-16">
            <span class="w3-xlarge">Ticket Per Subject</span><br>
            <div id="piechart_5" style="width: 250px; height: 200px;"></div>
        </div>
    </div>
    <div class="w3-quarter">
        <div class="w3-container w3-border w3-padding-16">
            <span class="w3-xlarge">Ticket Per Channel</span><br>
            <div id="piechart_6" style="width: 250px; height: 200px;"></div>
        </div>
    </div>
</div>
</div>
<div class="w3-row-padding w3-border w3-margin-bottom">
    <span class="w3-xlarge">Staff Performance Report</span><br>

        <div class="panel-body">
            {{ Form::open(array('route' => array('analytics.export', $reports))) }}
        <div class="form-group">
            {{ Form::label('created_from', 'Period from', array('class'=>'col-md-3 control-label')) }}
            <div class="w3-quarter">
                <input class="form-control" type="date" name="created_from" id="created_from"/>
            </div>
            {{ Form::label('created_to', 'to', array('class'=>'col-md-1 control-label')) }}
            <div class="w3-quarter">
                <input class="form-control" type="date" name="created_to" id="created_to"/>
            </div>

                {{ Form::reset('Clear', array('class' => 'btn btn-default')) }}
                {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}

        </div>




            {{ Form::close() }}
        </div>

</div>


@stop
<!-- search criteria -->
