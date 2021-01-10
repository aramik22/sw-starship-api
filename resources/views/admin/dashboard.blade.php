@extends('admin.layout')

@section('content')
	<h1>GENERAL DASHBOARD</h1>
	<p></p>
<div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{!! $count_data['starships'] !!}</h3>

              <p>STARSHIPS</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-star"></i>
            </div>
            <a href="starships" class="small-box-footer">See All Starships <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{!! $count_data['vehicles'] !!}</h3>

              <p>VEHICLES</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-car"></i>
            </div>
            <a href="vehicles" class="small-box-footer">See All Vehicles <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>	
<div class="row">
          <div class="col-md-12">
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">THE STAR WARS MACHINES UNIVERSE</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>

</div>
<script type="text/javascript" src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/adminlte/bower_components/chart.js/Chart.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $j('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : {!! $count_data['vehicles'] !!},
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'VEHICLES'
      },
      {
        value    : {!! $count_data['starships'] !!},
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'STARSHIPS'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)  
</script>
@stop
