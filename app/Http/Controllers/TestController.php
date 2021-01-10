<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 
class TestController extends Controller
{
    public function index()
    {
    	$response = Http::get('https://swapi.dev/api/starships/');
  
    	$jsonData = $response->json();
    	dd($jsonData);  
    	echo "<pre> status:";
    	print_r($response->status());
    	echo "<br/> ok:";
    	print_r($response->ok());
        echo "<br/> successful:";
        print_r($response->successful());
        echo "<br/> serverError:";
        print_r($response->serverError());
        echo "<br/> clientError:";
        print_r($response->clientError());
        echo "<br/> headers:";
        print_r($response->headers());
    }
}