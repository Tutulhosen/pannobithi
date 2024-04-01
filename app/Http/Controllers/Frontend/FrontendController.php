<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    
    public function home(){
        return view('home');
    }
    
    public function showSubCategory($id){
        if($id == 1){
            return view('pages.subcategory.index', ['id' => $id, 'title' => 'Mens Clothing']);
        }elseif($id == 2){
            return view('pages.subcategory.index', ['id' => $id, 'title' => 'Mens Clothing']);
        }elseif($id == 3){
            return view('pages.subcategory.index', ['id' => $id, 'title' => 'Womens Clothing']);
        }elseif($id == 4){
            return view('pages.subcategory.index', ['id' => $id, 'title' => 'Womens Clothing']);
        }elseif($id == 5){
            return view('pages.subcategory.index', ['id' => $id, 'title' => 'Kids Clothing']);
        }elseif($id == 6){
            return view('pages.subcategory.index', ['id' => $id, 'title' => 'Kids Clothing']);
        }
    }

    public function showProduct($id){
        return view('pages.product.index', ['id' => $id]);
    }
}
