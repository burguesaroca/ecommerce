<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Security\Role;
use App\Model\Security\RoleUser;
use App\Model\Security\Aplication;


class UserController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('UTC');
        
        $search = trim($request->get('search'));
        $users = User::with([
            'roles:roles.id,name'
        ])->search($search)->paginate(20);
        return response()->json([
            'users' => $users
        ], 201);
    }
    public function indexmesa(Request $request)
    {  
        $slug = $request->get('slug');
        $search = trim($request->get('search'));
        $users = User::with([
            'roles'
        ])->whereHas('roles', function ($query) use ($slug) {
             $query->where('roles.aplication_id',3 );
             $query->where('roles.slug',$slug);
          })->search($search)->paginate(10);          
        return response()->json([
            'users' => $users
        ], 201);
    }

    public function data(Request $request)
    {
        $roles = Role::where('aplication_id', $request->aplication)->get();  
        return [
            'roles' => $roles
        ];
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Ingrese nombre y apellido de usuario',
            'email.required' => 'Ingrese email de usuario',
            'password.required' => 'Ingrese password de usuario',
            'email.unique' => 'Este email ya se encuentra duplicado en otro usuario',
        ];

        $rules = [
            'name' => ['required','max:100'],
            'email' => ['required','max:100','unique:users'],
            'password' => ['required','max:100'],
        ];

        $this->validate(request(), $rules, $messages);

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = \Hash::make($request->get('password'));
        $user->save();
        return response()->json(["data" => $user, "message" => "success"], 201); 
    }

    public function update(Request $request)
    {
        $messages = [
            'name.required' => 'Ingrese nombre y apellido de usuario',
            'email.required' => 'Ingrese email de usuario',
            'email.unique' => 'Este email ya se encuentra duplicado en otro usuario',
        ];

        $rules = [
            'name' => ['required','max:100'],
            'email' => ['required','max:100','unique:users,email,'.$request->get('id').',id'],
        ];
        
        $this->validate(request(), $rules, $messages);

        $user = User::where('id', $request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = \Hash::make($request->password);
        }
        $user->save();
        return response()->json(["user" => $user, "message" => "success"], 201);     
    }

    public function rolspecific(Request $request)
    {  
        $name = $request->get('name');
        $aplication = $request->get('aplication_id');
        $users = User::select('id as id_user','name','email')
        ->whereHas('roles', function ($query) use ($name,$aplication) {
             $query->where('roles.aplication_id',$aplication );
             $query->where('roles.name','LIKE','%'.$name.'%');
          })->get();
                 
        return response()->json([
            'users' => $users
        ], 201);
    }
    
  

}

