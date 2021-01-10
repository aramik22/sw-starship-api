@extends('admin.layout')

@section('content')
	<h1>{!! strtoupper($starship_data->name); !!} REVIEW</h1>
	<p></p>
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="profile-username text-center">{!! $starship_data->name; !!}</h3>

              <p class="text-muted text-center">{!! $starship_data->model; !!}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Starship in the universe</b> <a class="pull-right">{!! $starship_data->total_count; !!}</a>
                </li>
                <li class="list-group-item" style="height: 52px;">
                  <b>Manufacturer</b> <a class="pull-right">{!! $starship_data->manufacturer; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Cost in credits</b> <a class="pull-right">{!! $starship_data->cost_in_credits; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Length</b> <a class="pull-right">{!! $starship_data->length; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Max atmosphering speed</b> <a class="pull-right">{!! $starship_data->max_atmosphering_speed; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Crew</b> <a class="pull-right">{!! $starship_data->crew; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Passengers</b> <a class="pull-right">{!! $starship_data->passengers; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Cargo capacity</b> <a class="pull-right">{!! $starship_data->cargo_capacity; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Consumables</b> <a class="pull-right">{!! $starship_data->consumables; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Hyperdrive rating</b> <a class="pull-right">{!! $starship_data->hyperdrive_rating; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>MGLT</b> <a class="pull-right">{!! $starship_data->MGLT; !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Starship_class</b> <a class="pull-right">{!! $starship_data->starship_class; !!}</a>
                </li>                                                                                                                                                                            
              </ul>
               <form action=" {!!action('StarshipController@set_total_count_starship_by_id') !!}" method="POST">
                {{ csrf_field() }}
                  <div class="form-group">
                      <label for="exampleInputEmail1">Change Total Count</label>
                      <input type="number" class="form-control" id="total_count" name="total_count" placeholder="{!! $starship_data->total_count; !!}">
                      <input type="hidden" class="form-control" id="starship_id" name="starship_id" value="{!! $starship_data->starship_id; !!}" placeholder="{!! $starship_data->starship_id; !!}">                      
                  </div>
                  <button type="submit" class="btn btn-primary">SAVE</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                

                <!-- Post -->
                <div class="post">
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-12">
                      <img class="img-responsive" src="/adminlte/img/sw/{!! $starship_data->image_src; !!}" alt="Photo">
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
@stop
