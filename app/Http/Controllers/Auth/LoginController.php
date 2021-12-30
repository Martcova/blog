<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login (Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return response ()->json([
                'token' => $request->user()->createToken('MyApp')->plainTextToken,
                'id' => $request->user()->id,
                'rol_id' => $request->user()->rol_id,
                'message' => 'Login Success'
            ]);
        }
        else{
            return response ()->json([
                'error' => 'Login Failed'
            ], 401);
        }
    }

    public function logout (Request $request){
        $request->user()->currentAccessToken()->delete();
        return response ()->json([
            'message' => 'Logout Success'
        ]);
    }
}
