<?php

namespace App\Arrival\Controllers;

use Backend\Classes\Controller;
use App\Arrival\Models\Arrival;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Event;



//documentation Eloquent : https://laravel.com/docs/10.x/eloquent-resources

class AllArrivalsController extends Controller
{


    public function getAllDatas()
    {   //Check if user is authenticated
        $arrivals = Arrival::all(); //Eloquent

        return response()->json($arrivals);
    }

    public function addArrival(Request $request)
    {
        $user = auth()->user();

        $data = $request->json()->all();

        // Get the last ID
        $lastId = Arrival::max('id');

        // Set the timezone to 'Europe/Bratislava'
        $timestamp = Carbon::now('Europe/Bratislava');

        $newArrival = Arrival::create([
            'id' => $lastId + 1,
            'user_id' => $user->id,
            'name' => $data['name'],
            'timestamp' => $timestamp,
        ]);

        Event::fire('app.arrival.created', [$newArrival]); //Using Event::listen doesnt work 

        // Build the response data
        $responseData = [
            'id' => $newArrival->id,
            'user_id' => $newArrival->user_id,
            'name' => $newArrival->name,
            'timestamp' => $newArrival->timestamp,
        ];

        return response()->json($responseData);
    }
}
