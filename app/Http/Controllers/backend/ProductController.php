<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //product list
    public function productList(){
        return view('backend.product.list');
    }

    //product create page
    public function productCreate(){
        $data['category']=DB::table('category')->get();
        $data['subcategory']=DB::table('subcategory')->get();
        return view('backend.product.create')->with($data);
    }
}
