<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Validator;
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles_data = Vehicle::select('vehicles.vehicle_id', 'vehicles.name', 'vehicles.model', 'vehicles.total_count', 'vehicles_images.image_src')
                ->leftjoin('vehicles_images', 'vehicles.name', '=', 'vehicles_images.name')
                ->get();
        
        return view('admin.vehicles')->with('vehicles_data',$vehicles_data);
    }
    public function vehicle_review(Request  $request)
    {
        $vehicle_data = vehicle::select('vehicles.*', 'vehicles_images.image_src')
                ->leftjoin('vehicles_images', 'vehicles.name', '=', 'vehicles_images.name')->where('vehicles.vehicle_id', '=', $request->vehicle_id)->first();
        return view('admin.vehicle')->with('vehicle_data',$vehicle_data);
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function show_all_vehicles(){
        $vehicles = Vehicle::all();
        return $vehicles->toJson(); 
    }
    public function show_vehicle(Request  $request)
    {   
        $result = Vehicle::where('name', $request->name)->first();
        return $result;
    }
    public function get_total_count_vehicle(Request  $request)
    {   
        $result = Vehicle::where('name', $request->name)->get(['total_count'])->first();
        return $result;
    }
    public function set_total_count_vehicle(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'total_count' => 'integer|required',
        ]);
        if($validator->fails()){
            return "total_count debe ser un número entero.";
        }
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if($validator->fails()){
            return "name es requerido";
        }          
        $vehicle = Vehicle::where('name', $request->name)->first();
        if($vehicle) {
            Vehicle::where('name', $request->name)->update(['total_count' => $request->total_count]);
            return "The new total of " . $request->name . " is " . $request->total_count;
        }

    }
    public function set_total_count_vehicle_by_id(Request  $request)
    {   
        $vehicle = Vehicle::where('vehicle_id', $request->vehicle_id)->first();
        if($vehicle) 
        {
            Vehicle::where('vehicle_id', $request->vehicle_id)->update(['total_count' => $request->total_count]);

        }
        return back();

    }
    public function set_total_count_vehicle_by_id_api(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'total_count' => 'integer|required',
        ]);
        if($validator->fails()){
            return "total_count debe ser un número entero.";
        }
        $validator = Validator::make($input, [
            'vehicle_id' => 'integer|required',
        ]);
        if($validator->fails()){
            return "vehicle_id es requerido";
        }          
        $vehicle = Vehicle::where('vehicle_id', $request->vehicle_id)->first();
        if($vehicle) 
        {
            Vehicle::where('vehicle_id', $request->vehicle_id)->update(['total_count' => $request->total_count]);

        }
        return "The new total is " . $request->total_count;

    }        
    public function add_total_count_vehicle(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'add' => 'integer|required',
        ]);
        if($validator->fails()){
            return "add must be an integer greater than 0.";
        }
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if($validator->fails()){
            return "name es requerido";
        }         
        $vehicle = Vehicle::where('name', $request->name)->first();

        if($vehicle) 
        {
            vehicle::where('name', $request->name)->update(['total_count' => (int)$vehicle->total_count + (int)$request->add]);
            return "The new total of " . $vehicle->name . " is " . ((int)$vehicle->total_count + (int)$request->add);
        }

    } 
    public function add_total_count_vehicle_by_id(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'add' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return "add must be an integer greater than 0.";
        }
        $validator = Validator::make($input, [
            'vehicle_id' => 'integer|required',
        ]);
        if($validator->fails()){
            return "vehicle_id must be an integer.";
        }             
        $vehicle = Vehicle::where('vehicle_id', $request->vehicle_id)->first();

        if($vehicle) 
        {
            vehicle::where('vehicle_id', $request->vehicle_id)->update(['total_count' => (int)$vehicle->total_count + (int)$request->add]);
            return "The new total is " . ((int)$vehicle->total_count + (int)$request->add);
        }

    }        
    public function subtract_total_count_vehicle(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'subtract' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return "subtract must be an integer greater than 0";
        }
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if($validator->fails()){
            return "name is required";
        }  
        $vehicle = Vehicle::where('name', $request->name)->first();

        if($vehicle) {
            if((int)$vehicle->total_count - (int)$request->subtract < 0){
                return "The new total cannot be less than 0.";
            }
            else
            {
                vehicle::where('name', $request->name)->update(['total_count' => (int)$vehicle->total_count - (int)$request->subtract]);
                return "The new total " . $vehicle->name . " is " . ((int)$vehicle->total_count + (int)$request->subtract);                
            }

        }

    }
public function subtract_total_count_vehicle_by_id(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'subtract' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return "subtract must be an integer greater than 0";
        }
        $validator = Validator::make($input, [
            'vehicle_id' => 'integer|required',
        ]);
        if($validator->fails()){
            return "vehicle_id must be an integer";
        }             
        $vehicle = Vehicle::where('vehicle_id', $request->vehicle_id)->first();

        if($vehicle) {
            if((int)$vehicle->total_count - (int)$request->subtract < 0){
                return "The new total cannot be less than 0.";
            }
            else
            {
                vehicle::where('vehicle_id', $request->vehicle_id)->update(['total_count' => (int)$vehicle->total_count - (int)$request->subtract]);
                return "The new total is " . ((int)$vehicle->total_count + (int)$request->subtract);                
            }

        }

    }                          
    public function sincronize_vehicles()
    {
        Vehicle::truncate();
        $response = Http::get('https://swapi.dev/api/vehicles/?page=1');
  
        $jsonData = $response->json();
        $count = $jsonData['count'];
        $next = $jsonData['next'];
        $previous = $jsonData['previous'];
        $results = $jsonData['results'];
        $i = 0;
        foreach ($results as $result) {
            $vehicle = new Vehicle;
            $vehicle->name = $result['name'];
            $vehicle->model = $result['model'];
            $vehicle->total_count = 0;
            $vehicle->manufacturer = $result['manufacturer'];
            $vehicle->cost_in_credits = $result['cost_in_credits'];
            $vehicle->length = $result['length'];
            $vehicle->max_atmosphering_speed = $result['max_atmosphering_speed'];
            $vehicle->crew = $result['crew'];
            $vehicle->passengers = $result['passengers'];
            $vehicle->cargo_capacity = $result['cargo_capacity'];
            $vehicle->consumables = $result['consumables'];
            $vehicle->vehicle_class = $result['vehicle_class'];
            $vehicle->save();
            $i++;
        }

        while ($next !=null) {
            $response = Http::get($next);
            $jsonData = $response->json();
            $count = $jsonData['count'];
            $next = $jsonData['next'];
            $previous = $jsonData['previous'];
            $results = $jsonData['results'];
            foreach ($results as $result) {
                $vehicle = new Vehicle;
                $vehicle->name = $result['name'];
                $vehicle->model = $result['model'];
                $vehicle->total_count = 0;
                $vehicle->manufacturer = $result['manufacturer'];
                $vehicle->cost_in_credits = $result['cost_in_credits'];
                $vehicle->length = $result['length'];
                $vehicle->max_atmosphering_speed = $result['max_atmosphering_speed'];
                $vehicle->crew = $result['crew'];
                $vehicle->passengers = $result['passengers'];
                $vehicle->cargo_capacity = $result['cargo_capacity'];
                $vehicle->consumables = $result['consumables'];
                $vehicle->vehicle_class = $result['vehicle_class'];
                $vehicle->save();
                $i++;
            }
        }
        if($i > 0){
            return $i . " NEW VEHICLES IMPORTED";
        }
        else
        {
            "NO VEHICLE WAS IMPORTED";
        }
               
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
