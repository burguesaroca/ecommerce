<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','refresh']]);
    }

    public function login(Request $request)
    {
        if (! $token = auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } 

        /* $user = User::select('id','name')->with([
            'roles:id,aplication_id,name',
            'roles.aplications:id,name',
            'roles.permissions:slug',
            'roles.roleusers.dependencies:id,name'
        ])->SearchAplicationPermission($request->aplication)->first()->toArray();
    
        if(!$user['roles']){
            auth()->logout();
            return response()->json(['error' => 'Unauthorized'], 401);
        } */

        return $this->respondWithToken($token);
    }

    public function me(Request $request)
    {
        $user = User::select('users.id','name')->with([        
            'roles:id,aplication_id,name',
            'roles.aplications:id,name',
            'roles.permissions:slug',
            'roles.roleusers.dependences:id,name'
        ])->SearchAplicationPermission($request->aplication)->first()->toArray();
        return response()->json(['user' => $user]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
