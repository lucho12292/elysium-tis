<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user != null)
        {            
            return Hash::check($request->password, $user->password) 
                ? response()->json($user)
                : response()->json(["Message" => "Login Failure"], 401);
        }
        else
        {
            response()->json(["Message" => "The email doesn't exist"], 404);
        }
    }
}
