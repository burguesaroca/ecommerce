<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Security\Aplication;

class ManagementController extends Controller
{
    public function index (Request $request)
    {
        date_default_timezone_set('UTC');
        
        $search = trim($request->get('search'));
        
        $aplications = Aplication::select(
            'id', 'name', 'state', 'created_at', 'updated_at'
        )->where('name','LIKE','%'.$search.'%')->paginate(20);
        return response()->json([
            'aplications'=>$aplications
        ], 201);
    }

    public function store(Request $request){
        $aplication = new Aplication ();
        $aplication->name = $request->name;
        $aplication->state = $request->state;
        $aplication->save();
        return response()->json([
            'aplication' => $request],
        200);
    }

    public function update(Request $request){
        $aplication = Aplication::where('id', $request->id)->first();
        $aplication->name = $request->name;
        $aplication->state = $request->state;
        $aplication->save();
        return response()->json([
            'aplication' => $aplication
        ], 200);        
    }
    
}