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

    //product store
    public function productStore(Request $request){
        $title = $request->input('title');
        $productCode = $request->input('product_code');
        $category_id = $request->input('category_id');
        $sub_category_id = $request->input('sub_category_id');
        $size = $request->input('size');
        $description = $request->input('description');
        $price = $request->input('price');
        $discount = $request->input('discount');
    
        // For single file uploads
        if ($request->hasFile('thumbnail_image')) {
            $thumbnailImage = $request->file('thumbnail_image');
            $imageName = md5(time().'_'.rand()).'.'.$thumbnailImage->getClientOriginalExtension();
            
            // $thumbnailImage->move(public_path('images/galleries'), $imageName);
            
        }
        // For multiple file uploads
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $request->file('gallery_images');
            foreach ($galleryImages as $galleryImage) {
                $galleryImageName = md5(time().'_'.rand()).'.'.$galleryImage->getClientOriginalExtension();
                // Process each gallery image here
                // For example, you can move the file to a directory
                // $galleryImage->move(public_path('images/galleries'), $galleryImageName);
                return $galleryImageName; // This will return the generated image name
            }
        }
        // Now you can use these variables as needed
    }
}
