<?php

namespace App\Arrival\Controllers;

use Backend\Classes\Controller;
use App\Arrival\Models\Arrival;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Event;
use Tymon\JWTAuth\Facades\JWTAuth;



//documentation Eloquent : https://laravel.com/docs/10.x/eloquent-resources

class AllArrivalsController extends Controller
{   
    
    
    public function getAllDatas()
    {   //Check if user is authenticated
        if (!JWTAuth::parseToken()->authenticate()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $arrivals = Arrival::all(); //Eloquent

        return response()->json($arrivals);
    }

    public function addArrival(Request $request)
    {   
        if (!JWTAuth::parseToken()->authenticate()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $data = $request->json()->all();

        // Get the last ID
        $lastId = Arrival::max('id');

        // Set the timezone to 'Europe/Bratislava'
        $timestamp = Carbon::now('Europe/Bratislava');

        $newArrival = Arrival::create([
            'id' => $lastId + 1,
            'user_id'=> $data['user_id'],
            'name' => $data['name'],
            'timestamp' => $timestamp, 
        ]);

        Event::fire('app.arrival.created', [$newArrival]); //Using Event::listen doesnt work 

        return response()->json($newArrival);
    }
}
