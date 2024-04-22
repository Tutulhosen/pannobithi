<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('get_category_name')) {
    function get_category_name($id)
    {
        $category_name=DB::table('category')->where('id', $id)->select('name')->first();
        return $category_name->name;
    }
}

if (!function_exists('get_sub_category_name')) {
    function get_sub_category_name($id)
    {
        $sub_category_name=DB::table('subcategory')->where('id', $id)->select('name')->first();
        return $sub_category_name->name;
    }
}


?>