<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('get_category_name')) {
    function get_category_name($id)
    {
        $category_name=DB::table('category')->where('id', $id)->select('name')->first();
        return $category_name->name;
    }
}


?>