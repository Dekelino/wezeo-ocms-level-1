<?php

namespace App\Arrival\Controllers;

use Backend\Classes\Controller;
use RainLab\User\Models\User;
use Illuminate\Http\Request;
use RainLab\User\Facades\Auth as RainLabAuth;
use Illuminate\Support\Facades\Validator;
use Backend\Facades\BackendAuth;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;
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
    public function loginUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                throw ValidationException::withMessages(['Invalid credentials']);
            }

            $credentials = request(['email', 'password']);

            // Trying to authenticate the user
            if (!RainLabAuth::attempt($credentials)) {
                throw ValidationException::withMessages(['Invalid credentials']);
            }
            $authenticatedUser = RainLabAuth::getUser();

            //TOken generator
            $token = JWTAuth::fromUser($authenticatedUser);

            return response()->json(['message' => 'User logged in successfully',
             'user' => $authenticatedUser,
             'token' => $token
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
