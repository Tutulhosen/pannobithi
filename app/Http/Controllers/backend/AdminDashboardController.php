<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    //show dashboard page
    public function dashboard(){
        return view('backend.index');
    }

    // category list 
    public function categoryPage(){
        return view("backend.category.create");
    }

    //show category page
    public function categoryList(){
        $data['category_list']=DB::table('category')->get();
        // return $data['category_list'];exit;
        return view('backend.category.list')->with($data);
    }

    // store category
    public function categoryStore(Request $request){
        $imageName=null;
        $image = $request->file('image');
        $name = $request->name;
        if (!empty($image)) {
            $imageName = md5(time().'_'.rand()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
        } else {
            $imageName=null;
        }

       $insert= DB::table('category')->insert([
            'name' =>$name,
            'image' =>$imageName,
            'slug' =>Str::slug($name),
        ]);
        if ($insert) {
           return response()->json([
                'status' => true,
                'success' => 'Category created successfully!',
           ]);

        }
       
        

        


    }

    // category update page
    public function categoryupdatePage($id){
        $data['category_info']=DB::table('category')->where('id', $id)->first();
        return view('backend.category.edit')->with($data);
    }

    // store category
    public function categoryUpdate(Request $request){
        
        $previousImageName = DB::table('category')->where('id', $request->id)->value('image');
    
        $imageName = null;
        $image = $request->file('image');
        $name = $request->name;
    
        if (!empty($image)) {
            
            $imageName = md5(time().'_'.rand()).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/categories'), $imageName);
            
            if (!empty($previousImageName)) {
                $previousImagePath = public_path('images/categories') . '/' . $previousImageName;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

             // Update the category record in the database
            $update = DB::table('category')->where('id', $request->id)->update([
                'name' => $name,
                'image' => $imageName,
                'slug' => Str::slug($name),
            ]);
        }else {
            // Update the category record in the database
            $update = DB::table('category')->where('id', $request->id)->update([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    
       
    
        if ($update) {
            return response()->json([
                'status' => true,
                'success' => 'Category updated successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'error' => 'Nothing Change.',
            ]);
        }
    }


    //delete category
    public function categoryDelete($id){
        $previousImageName = DB::table('category')->where('id', $id)->value('image');
        $previousImagePath = public_path('images/categories') . '/' . $previousImageName;
        if (file_exists($previousImagePath)) {
            unlink($previousImagePath);
        }
        $delete=DB::table('category')->where('id', $id)->delete();
        if ($delete) {
            return response([
                'status' =>true,
                'message'=>"Successfully Delete A Category"
            ]);
        } else {
            return response([
                'status' =>false,
                'message'=>"Category is not deleted"
            ]);
        }
        
    }

    //category status update
    public function categoryStatusUpdate($id){
        $category_id=DB::table('category')->where('id', $id)->first();
        if ($category_id->status==1) {
           $update= DB::table('category')->where('id', $id)->update([
                'status'    =>0,
           ]);
            
        }elseif ($category_id->status==0) {
            $update= DB::table('category')->where('id', $id)->update([
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


