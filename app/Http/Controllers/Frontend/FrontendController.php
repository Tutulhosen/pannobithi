<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    
    public function home(){
        $hero['slider']=DB::table('sliders')->where('status', 1)->get();
        $hero['category']=DB::table('category')->where('status', 1)->get();
        $hero['sub_category']=DB::table('subcategory')->where('status', 1)->get();

        $all_products=DB::table('products')->latest()->get();
        
        $all_products_with_thmnl_array=[];
        foreach ($all_products as  $value) {
            $tmnl=DB::table('gallery')->where('product_id', $value->id)->select('image_name')->first();
            $each_data['id']=$value->id;
            $each_data['title']=$value->title;
            $each_data['price']=$value->price;
            $each_data['image']=$tmnl->image_name;
            array_push($all_products_with_thmnl_array, $each_data);
        }
        // $data['all_products']=$all_products_with_thmnl_array;
        $data['all_products']='Our Latest Products';
        return view('home', compact('hero', 'data'));
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
