<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //show dashboard page
    public function dashboard(){
        return view('backend.index');
    }

    //show category page
    public function categoryPage(){
        return view('backend.category.index');
    }









}


