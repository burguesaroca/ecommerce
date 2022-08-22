<?php

namespace App\Http\Controllers\api\Gestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Gestion\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $searchText = trim($request->get('search'));
        return Product::where('reference','LIKE','%'.$searchText.'%')
        ->Orwhere('name','LIKE','%'.$searchText.'%')
        ->paginate(12);
    }
}
