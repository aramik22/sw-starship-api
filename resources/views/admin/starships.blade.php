@extends('admin.layout')

@section('content')
	<h1>STARSHIPS DASHBOARD</h1>
	<p></p>
<div class="row">
@foreach($starships_data as $data)
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" center center;">
              <h3 class="widget-user-username">{!! $data->name; !!}</h3>
              <h5 class="widget-user-desc">{!! $data->model; !!}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="/adminlte/img/sw/{!! $data->image_src; !!}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{!! $data->total_count; !!}</h5>
                    <span class="description-text">STARSHIPS IN THE UNIVERSE</span>
                  </div>
                  <a href="starship/{!! $data->starship_id; !!}" class="small-box-footer">See More info <i class="fa fa-arrow-circle-right"></i></a>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
@endforeach	

</div>	
@stop
