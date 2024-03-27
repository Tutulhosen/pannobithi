<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
