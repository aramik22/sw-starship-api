<?php

namespace App\Http\Controllers;

use App\Starship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Item;
use Validator;

class StarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$starships_data = Starship::all();
        $starships_data = Starship::select('starships.starship_id', 'starships.name', 'starships.model', 'starships.total_count', 'starships_images.image_src')
                ->leftjoin('starships_images', 'starships.name', '=', 'starships_images.name')
                ->get();
        
        return view('admin.starships')->with('starships_data',$starships_data);
    }
    public function starship_review(Request  $request)
    {
        $starship_data = Starship::select('starships.*', 'starships_images.image_src')
                ->leftjoin('starships_images', 'starships.name', '=', 'starships_images.name')->where('starships.starship_id', '=', $request->starship_id)->first();
        if($starship_data){
            return view('admin.starship')->with('starship_data',$starship_data);    
        }
        
    }
    public function starship_data()

    {

        return view('starship');

    }
    public function set_total_count_starship_by_id(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'total_count' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return back();
        }
        else
        {
            $starship = Starship::where('starship_id', $request->starship_id)->first();
            if($starship) 
            {
                starship::where('starship_id', $request->starship_id)->update(['total_count' => $request->total_count]);

            }
            return back();            
        }      


    }
    public function set_total_count_starship_by_id_api(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'total_count' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'total_count must be an integer greater than 0.'], 400);
        }
        $validator = Validator::make($input, [
            'starship_id' => 'integer|required',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'starship_id must be an integer.'], 400);

        }             
        $starship = Starship::where('starship_id', $request->starship_id)->first();
        if($starship) 
        {
            starship::where('starship_id', $request->starship_id)->update(['total_count' => $request->total_count]);

        }
        return "The new total is " . $request->total_count;

    }     
    public function sincronize_starships()
    {
        Starship::truncate();
        $response = Http::get('https://swapi.dev/api/starships/?page=1');
  
        $jsonData = $response->json();
        $count = $jsonData['count'];
        $next = $jsonData['next'];
        $previous = $jsonData['previous'];
        $results = $jsonData['results'];
        $i = 0;
        foreach ($results as $result) {
            $starship = new Starship;
            $starship->name = $result['name'];
            $starship->model = $result['model'];
            $starship->total_count = 0;
            $starship->manufacturer = $result['manufacturer'];
            $starship->cost_in_credits = $result['cost_in_credits'];
            $starship->length = $result['length'];
            $starship->max_atmosphering_speed = $result['max_atmosphering_speed'];
            $starship->crew = $result['crew'];
            $starship->passengers = $result['passengers'];
            $starship->cargo_capacity = $result['cargo_capacity'];
            $starship->consumables = $result['consumables'];
            $starship->hyperdrive_rating = $result['hyperdrive_rating'];
            $starship->MGLT = $result['MGLT'];
            $starship->starship_class = $result['starship_class'];
            $starship->save();
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
                $starship = new Starship;
                $starship->name = $result['name'];
                $starship->model = $result['model'];
                $starship->total_count = 0;
                $starship->manufacturer = $result['manufacturer'];
                $starship->cost_in_credits = $result['cost_in_credits'];
                $starship->length = $result['length'];
                $starship->max_atmosphering_speed = $result['max_atmosphering_speed'];
                $starship->crew = $result['crew'];
                $starship->passengers = $result['passengers'];
                $starship->cargo_capacity = $result['cargo_capacity'];
                $starship->consumables = $result['consumables'];
                $starship->hyperdrive_rating = $result['hyperdrive_rating'];
                $starship->MGLT = $result['MGLT'];
                $starship->starship_class = $result['starship_class'];
                $starship->save();
                $i++;
            }
        }
        if($i > 0){
            return $i . " NEW STARSHIPS IMPORTED";
        }
        else
        {
            "NO STARSHIP WAS IMPORTED";
        }        
               
    }
    public function show_all_starships(){
        $starships = Starship::all();
        return $starships->toJson();     
    }
    public function set_total_count_starship(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'total_count' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'total_count must be an integer greater than 0.'], 400);
        }
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'name is required.'], 400);
        }              
        $starship = Starship::where('name', $request->name)->first();
        if($starship) {
            starship::where('name', $request->name)->update(['total_count' => $request->total_count]);
            return "The new total of " . $request->name . " is " . $request->total_count;
        }

    }
    public function add_total_count_starship(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'add' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'add must be an integer greater than 0.'], 400);
        }
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'name is required'], 400);

        }             
        $starship = Starship::where('name', $request->name)->first();

        if($starship) {
            starship::where('name', $request->name)->update(['total_count' => (int)$starship->total_count + (int)$request->add]);
            return "The new total of " . $starship->name . " is " . ((int)$starship->total_count + (int)$request->add);
        }

    }
    public function add_total_count_starship_by_id(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'add' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'add must be an integer greater than 0.'], 400);
        }
        $validator = Validator::make($input, [
            'starship_id' => 'integer|required',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'starship_id must be an integer.'], 400);
        }             
        $starship = Starship::where('starship_id', $request->starship_id)->first();

        if($starship) {
            starship::where('starship_id', $request->starship_id)->update(['total_count' => (int)$starship->total_count + (int)$request->add]);
            return "The new total is " . ((int)$starship->total_count + (int)$request->add);
        }

    }    
    public function subtract_total_count_starship(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'subtract' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'subtract must be an integer greater than 0.'], 400);
        }
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'name is required'], 400);
        }             
        $starship = Starship::where('name', $request->name)->first();

        if($starship) {
            if((int)$starship->total_count - (int)$request->subtract < 0){
                return response()->json(['message' => 'The new total cannot be less than 0.'], 400);
            }
            else
            {
                starship::where('name', $request->name)->update(['total_count' => (int)$starship->total_count - (int)$request->subtract]);
                return "The new total " . $starship->name . " is " . ((int)$starship->total_count + (int)$request->subtract);                
            }

        }

    }
    public function subtract_total_count_starship_by_id(Request  $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'subtract' => 'integer|required|min:0',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'subtract must be an integer greater than 0.'], 400);
        }
        $validator = Validator::make($input, [
            'starship_id' => 'integer|required',
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'starship_id must be an integer'], 400);
        }             
        $starship = Starship::where('starship_id', $request->starship_id)->first();

        if($starship) {
            if((int)$starship->total_count - (int)$request->subtract < 0){
                return response()->json(['message' => 'The new total cannot be less than 0.'], 400);
            }
            else
            {
                starship::where('starship_id', $request->starship_id)->update(['total_count' => (int)$starship->total_count - (int)$request->subtract]);
                return "The new total is " . ((int)$starship->total_count + (int)$request->subtract);                
            }

        }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Starship  $starship
     * @return \Illuminate\Http\Response
     */
    public function show_starship(Request  $request)
    {   
        $result = Starship::where('name', $request->name)->first();
        return $result;
    }
    public function get_total_count_starship(Request  $request)
    {   
        $result = Starship::where('name', $request->name)->get(['total_count'])->first();
        if($result)
        {
            return $result;
        }
        else
        {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        
         
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Starship  $starship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Starship $starship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Starship  $starship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Starship $starship)
    {
        //
    }
}
