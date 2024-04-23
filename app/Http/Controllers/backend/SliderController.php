<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    // slider create
    public function sliderPage(){
        $data['category']=DB::table('category')->get();
        $data['subcategory']=DB::table('subcategory')->get();
        return view("backend.slider.create")->with($data);
    }

    //show slider list
    public function sliderList(){
        $data['slider_list']=DB::table('sliders')->get();
        // return $data['category_list'];exit;
        return view('backend.slider.list')->with($data);
    }

    // store slider
    public function sliderStore(Request $request){
        $imageName=null;
        $image = $request->file('image');
        $title = $request->title;
        $category_id = $request->category_id;
        $sub_category_id = $request->sub_category_id;
        $slogan = $request->slogan;
        if (!empty($image)) {
            $imageName = md5(time().'_'.rand()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/slider'), $imageName);
        } else {
            $imageName=null;
        }

       $insert= DB::table('sliders')->insert([
            'title' =>$title,
            'slogan' =>$slogan,
            'category_id' =>$category_id,
            'sub_cat_id' =>$sub_category_id,
            'image_name' =>$imageName,
            
        ]);
        if ($insert) {
           return response()->json([
                'status' => true,
                'success' => 'Category created successfully!',
           ]);

        }
       

    }

    // slider update page
    public function sliderupdatePage($id){
        $data['category']=DB::table('category')->get();
        $data['subcategory']=DB::table('subcategory')->get();
        $data['slider_info']=DB::table('sliders')->where('id', $id)->first();
        return view('backend.slider.edit')->with($data);
    }

    // update slider
    public function sliderUpdate(Request $request){
        
        $slider = DB::table('sliders')->where('id', $request->id)->value('image_name');
   
        $imageName=null;
        $image = $request->file('image');
        
        $title = $request->title;
        $category_id = $request->category_id;
        $sub_category_id = $request->sub_category_id;
        $slogan = $request->slogan;
        if (!empty($image)) {
            
            $imageName = md5(time().'_'.rand()).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/slider'), $imageName);
            
            if (!empty($slider)) {
                $previousImagePath = public_path('images/slider') . '/' . $slider;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

             // Update the category record in the database
            $update = DB::table('sliders')->where('id', $request->id)->update([
                'title' =>$title,
                'slogan' =>$slogan,
                'category_id' =>$category_id,
                'sub_cat_id' =>$sub_category_id,
                'image_name' =>$imageName,
            ]);
        }else {
            // Update the category record in the database
            
            $update = DB::table('sliders')->where('id', $request->id)->update([
                'title' =>$title,
                'slogan' =>$slogan,
                'category_id' =>$category_id,
                'sub_cat_id' =>$sub_category_id,
               
            ]);
          
           
        }
    
       
    
        if ($update) {
            return response()->json([
                'status' => true,
                'success' => 'Slider updated successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'error' => 'Nothing Change.',
            ]);
        }
    }


    //delete slider
    public function sliderDelete($id){
        $previousImageName = DB::table('sliders')->where('id', $id)->value('image_name');
        $previousImagePath = public_path('images/slider') . '/' . $previousImageName;
        if (file_exists($previousImagePath)) {
            unlink($previousImagePath);
        }
        $delete=DB::table('sliders')->where('id', $id)->delete();
        if ($delete) {
            return response([
                'status' =>true,
                'message'=>"Successfully Delete A Slider"
            ]);
        } else {
            return response([
                'status' =>false,
                'message'=>"Slider is not deleted"
            ]);
        }
        
    }

    //slider status update
    public function sliderStatusUpdate($id){
        $sliders_id=DB::table('sliders')->where('id', $id)->first();
        if ($sliders_id->status==1) {
           $update= DB::table('sliders')->where('id', $id)->update([
                'status'    =>0,
           ]);
            
        }elseif ($sliders_id->status==0) {
            $update= DB::table('sliders')->where('id', $id)->update([
                'status'    =>1,
           ]);
            
        }
        if ($update) {
            return response([
                'status' =>true,
               
            ]);
        }else {
            return response([
                'status' =>false,
               
            ]);
        }

    }
}
