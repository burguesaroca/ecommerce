<?php
//controller de user_rol 
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Security\RoleUser;
use App\Model\Security\Role;
use App\Model\Security\Aplication;
use App\User;

class UserRolController extends Controller
{
    //  function user_roles de todos los roles y aplicaciones bd.
    public function user_roles(Request $request)
    {
        $aplication = $request->aplication;
        $search = $request->search;
        $roles = Role::with([
            'aplications'
        ])->where('aplication_id','LIKE','%' .$aplication. '%')
        ->where('name','LIKE','%'.$search.'%')->paginate(20);
        return response()->json([
            'roles' => $roles
        ]);
    }
     //funcion Roles_aplications de roles y aplicaciones por usuario.
    public function Roles_aplications(Request $request)
    {
        $user = User::with([
            'roles',
            'roles.aplications'
            ])->where('id', $request->user)->first();
            return response()->json([
                'roles' => $user   
            ], 200);   
    }
    //function dataaplications de aplicaciones en el sistema
    public function dataaplications() 
    {
        $aplications = Aplication::select('id','name')->get();
        return response()->json(['aplications' => $aplications]);
    }
    //function update para actuzalizar roles y aplicaciones por usuario
    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $roles = $user->roles()->sync($request->get('roles'));
        return $roles; 
    }
}
