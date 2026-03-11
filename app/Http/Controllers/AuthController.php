<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{   


    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'telefono' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $user = User::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data'=> $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
        
    }


    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('telefono', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::with(['roles:id,nombre'])->where('telefono',$request['telefono'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        $role = $user->roles->map(function ($role) {
            return [
                'id' => $role->id,
                'nombre' => $role->nombre
            ];
        });

        $user->roles = $role;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout exitoso'
        ]);
    }

    
}