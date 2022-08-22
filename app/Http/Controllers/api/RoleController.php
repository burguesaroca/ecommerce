<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Security\Role;
use App\Model\Security\Aplication;
use App\Model\Security\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $roles = Role::with([
            'aplications'
        ])->orderBy('aplication_id')
        ->search($search)->paginate(20);
        return [
            'roles' => $roles            
        ];
    }

    public function data() 
    {
        $aplications = Aplication::select('id','name')->get();
        return response()->json(['aplications' => $aplications]);
    }

    public function store(Request $request)
    {
            $messages = [
                'aplication_id.required' => 'Ingrese aplicación de usuario',
                'name.required' => 'Ingrese nombre y apellido de usuario',
                'slug.required' => 'Ingrese slug de usuario',
                'slug.unique' => 'Este slug ya se encuentra duplicado en otro usuario',
            ];

            $rules = [
                'aplication_id' => ['required','max:100'],
                'name' => ['required','max:100'],
                'slug' => ['required','max:100','unique:roles'],
            ];

            $this->validate(request(), $rules, $messages);
            
            $role = new Role();
            $role->aplication_id = $request->aplication_id;
            $role->name = $request->name;
            $role->slug = $request->slug;
            $role->state = 1;
            $role->save();
            return response()->json([
                "role" => $role, 
                "message" => "success"], 
            201);
    }

    public function update(Request $request)
    {
        $messages = [
            
            'aplication_id.required' => 'Ingrese aplicación',
            'name.required' => 'Ingrese nombre y apellido de usuario',
            'slug.required' => 'Ingrese nombre y apellido de usuario',
            'slug.unique' => 'Este slug ya se encuentra duplicado en otro usuario',
        ];

        $rules = [
            'aplication_id' => ['required','max:100'],
            'name' => ['required','max:100'],
            'slug' => ['required','max:100','unique:roles,slug,'.$request->get('id').',id'],
        ];

        $this->validate(request(), $rules, $messages);

        // $this->validate(request(), [
        //     //'slug' => ['required','max:10','slug:roles'],
        //     'slug' => ['required','max:100','unique:roles,slug,'.$request->get('id').',id'],
        // ], $messages);
        
        $role = Role::where('id', $request->id)->first();
        $role->aplication_id = $request->aplication_id;
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();
        return response()->json([
            "role" => $role, 
            "message" => "success"], 
        201);
    }
}
