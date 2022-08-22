<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Security\Permission;
use App\Model\Security\Module;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('UTC');
        
        $search = trim($request->get('search'));
        $permissions = Permission::with([
            'modules'
        ])->where('name','LIKE','%'.$search.'%')->paginate(20);
        return response()->json([
            'permissions'=>$permissions
        ], 201);
    }
    
    public function data() 
    {
        $modules = Module::select('id','name')->get();
        return response()->json(['modules' => $modules]);
    }

    public function store(Request $request)
    {
        $permission = new Permission ();
        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->module_id = $request->module_id;
        $permission->save();
        return response()->json([
            'permission' => $request],
        200);
    }
    
    public function update(Request $request)
    {
        $permission = Permission::where('id', $request->id)->first();
        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->module_id = $request->module_id;
        $permission->save();
        return response()->json([
            'permission' => $permission
        ], 200);
    } 

}
