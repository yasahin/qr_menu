<?php

use App\Models\Categories;
use App\Models\Products;


# KATEGORİLERİ GETİRİR
function getAllCategories(){
    $All = Categories::get();
    return $All;
}

# KATEGORİLERİ GETİRİR
function getAllProducts(){
    $All = Products::get();
    return $All;
}

function IndirimdekilerSay(){

    $say = 0;

    $getAll = Products::get();
    foreach ($getAll as $a){

        if($a->sale_price != null && $a->sale_price < $a->price){
            $say = $say + 1;
        }

    }

    return $say;

}
