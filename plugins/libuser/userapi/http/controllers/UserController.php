<?php

namespace LibUser\Userapi\Http\Controllers;

use LibUser\Userapi\Http\Resources\UserResource;
use Exception;
use RainLab\User\Facades\Auth;
use RainLab\User\Models\User as RainLabUser;

class UserController
{

    // register user
    function register()
    {
        try {
            $credentials = [
                "name" => post("name"),
                "surname" => post("surname"),
                "email" => post("email"),
                "password" => post("password"),
                "password_confirmation" => post("password_confirmation")
            ];

            // Use RainLab User model for registration
            $user = RainLabUser::create($credentials);

            return new UserResource($user);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // login user
    function login()
    {
        try {
            $credentials = [
                "email" => post("email"),
                "password" => post("password")
            ];

            if (!$token = Auth::attempt($credentials)) {
                throw new Exception("Wrong email or password");
            }

            $user = Auth::getUser();

            return $this->respondWithToken($token, $user);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    // respond json array with jwt info
    private function respondWithToken($token, $user)
    {
        return response()->json([
            "token" => $token,
            "token_type" => "bearer",
            "expires_in" => config("jwt.ttl"),
            "user" => new UserResource($user)
        ]);
    }
}
