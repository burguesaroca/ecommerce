<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Security\PermissionRole;
use App\Model\Security\Permission;
use App\Model\Security\Role;
use App\Model\Security\Module;
use App\Model\Security\Aplications;

class RoleActionController extends Controller
{
    public function index (Request $request) 
    {
        $modules = $request->modules;
        $search = $request->search;
        $permission = Permission::with([
            'modules'
        ])->where('module_id','LIKE','%' .$modules. '%')
        ->where('name','LIKE','%'.$search.'%')->paginate(20);
        return response()->json(['permission' => $permission]);        
    }

    public function rolepermission (Request $request) {
        $roles = Role::with([
            'permissions',
            'aplications'
        ])->where('id', $request->role)->first();
        return response()->json([
            'permissions' => $roles            
        ], 200);     
    }

    public function updatePermission (Request $request){
        $roles = Role::where('id', $request->id)->first();
        $permissions = $roles->permissions()->sync($request->get('permissions'));
        return $permissions;
    }

    public function datamodules (){
        $module = Module::select('id','name')->get();
        return response()-> json(['module' => $module]);
    }

}