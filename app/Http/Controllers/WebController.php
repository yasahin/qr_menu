<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class WebController extends Controller
{
    //

    function index(){
        return view("web.index");
    }

    function discounts(){
        return view("web.discounts");
    }

    function category($id){
        $find = Categories::find($id);

        return view("web.category")
            ->with("CategoryName",$find->name)
            ->with("Products",$find->products);
    }

}
