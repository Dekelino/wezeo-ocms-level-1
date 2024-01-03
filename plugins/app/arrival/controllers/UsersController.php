<?php

namespace App\Arrival\Controllers;

use Backend\Classes\Controller;
use RainLab\User\Models\User;
use Illuminate\Http\Request;
use Backend\Facades\BackendAuth;
use Exception;

class UsersController extends Controller
{
    public function createUser(Request $request)
    {
        try {

            $credentials = $request->json()->all();
            // create  a new user record
            $user = User::create($credentials);
            // log in the new user
            BackendAuth::login($user);

            return response()->json(['message' => 'User created and logged in successfully', 'user' =>
            $user]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
