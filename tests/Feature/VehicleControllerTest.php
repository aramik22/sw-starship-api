<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_all_vehicles()
    {
        $response = $this->get('/show_all_vehicles');

        $response->assertStatus(200);
    }
    function test_has_vehicle()
    {
    $this->assertDatabaseHas('vehicles', [
    'name' => 'Armored Assault Tank'
    ]);
    }
    public function test_add_total_count_vehicle_failed()
    {
        $response = $this->put('/api/add_total_count_vehicle');

        $response->assertStatus(400);

    }
    public function test_set_total_count_vehicle_failed()
    {
        $response = $this->put('/api/set_total_count_vehicle');

        $response->assertStatus(400);

    }
    public function test_subtract_total_count_vehicle_failed()
    {
        $response = $this->put('/api/subtract_total_count_vehicle');

        $response->assertStatus(400);

    }
    public function test_show_vehicle()
    {
        $response = $this->get('/show_vehicle/Emergency Firespeeder');

        $response->assertStatus(200);
    }            
}
