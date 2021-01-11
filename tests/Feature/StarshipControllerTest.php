<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use App\Starship;

class StarshipControllerTest extends TestCase
{
    //use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

/*        Sanctum::actingAs(
            factory(Starship::class)->create(),
            ['*']
        );*/
    }
    public function test_show_all_starships()
    {
        $response = $this->get('/show_all_starships');

        $response->assertStatus(200);
    }    
    function test_has_starship()
    {
    $this->assertDatabaseHas('starships', [
    'name' => 'CR90 corvette'
    ]);
    }
    public function test_add_total_count_starship_failed()
    {
        $response = $this->put('/api/add_total_count_starship');

        $response->assertStatus(400);

    }
    public function test_set_total_count_starship_failed()
    {
        $response = $this->put('/api/set_total_count_starship');

        $response->assertStatus(400);

    }
    public function test_subtract_total_count_starship_failed()
    {
        $response = $this->put('/api/subtract_total_count_starship');

        $response->assertStatus(400);

    }   
    public function test_show_starship()
    {
        $response = $this->get('/show_starship/X-wing');

        $response->assertStatus(200);
    }
    public function test_set_total_count()
    {

        $response = $this->call('PUT', '/api/set_total_count_starship_by_id', array(
            'starship_id' => "1",
            'total_count' => "125"
        ));
        $response->assertStatus(200);        ;
    }
    public function test_add_set_total_count()
    {

        $response = $this->call('PUT', '/api/add_total_count_starship_by_id', array(
            'starship_id' => "1",
            'add' => "5"
        ));
        $response->assertStatus(200);        ;
    } 
    public function test_set_set_total_count()
    {

        $response = $this->call('PUT', '/api/subtract_total_count_starship_by_id', array(
            'starship_id' => "1",
            'subtract' => "5"
        ));
        $response->assertStatus(200);        ;
    }           
}
