<?php

namespace App\Http\Controllers;

use App\Starship;
use App\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_count_starships =  Starship::sum('total_count');
        $total_count_vehicles = Vehicle::sum('total_count');
        $count_data = [
            'starships' => $total_count_starships,
            'vehicles'  => $total_count_vehicles,

        ];

        return view('admin.dashboard', compact('count_data'));
    }
}
