<?php

namespace App\Arrival\Http\Controllers;

use App\Arrival\Models\Arrival;
use Backend\Classes\Controller;
use Illuminate\Http\Request;
use App\Arrival\Http\Resources\ArrivalResource;
use LibUser\Userapi\Http\Resources\UserResource;
use Carbon\Carbon;
use LibUser\Userapi\Models\User;

class AllArrivalsController extends Controller
{
    public function getAllDatas()
    {   
        $arrivals = Arrival::all();
        return ArrivalResource::collection($arrivals);
    }

    public function getUserArrivals()
    {
        $user = auth()->user();
        $userResource = new UserResource($user);
        $arrivals = Arrival::where('user_id', $user->id)->get();
        return ArrivalResource::collection($arrivals, $userResource);
    }

    public function addArrival(Request $request)
    {
        $user = auth()->user();
        $arrival = new Arrival();
        $arrival->arrivalName = $request->arrivalName;
        $arrival->user_id = $user->id;
        $arrival->userName = $user->name . ' ' . $user->surname;
        $arrival->timestamp = Carbon::now('Europe/Bratislava');
        $arrival->save();
        return ArrivalResource::make($arrival);
    }
}
