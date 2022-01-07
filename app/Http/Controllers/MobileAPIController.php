<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MobileAPIController extends Controller
{
    //

    function get_categories(){

        $allCategories = Categories::orderBy("name","ASC")->get();

        return json_encode($allCategories);

    }

    function create_product(Request $request){

        if(!empty($request->category_id) && !empty($request->model_code) && !empty($request->color) && !empty($request->stock) && !empty($request->barcode)){

            $findProduct = Products::where("barcode","=",$request->barcode)->first();
            if(!$findProduct){

                $new = new Products;

                $new->category_id = $request->category_id;
                $new->model_code = mb_strtoupper($request->model_code);
                $new->color = mb_strtoupper($request->color);
                $new->stock = $request->stock;
                $new->barcode = $request->barcode;

                $new->save();

                return json_encode(array(
                    'result' => "success"
                ));

            }else{
                return json_encode(array(
                    'result' => "unique"
                ));
            }

        }else{
            return json_encode(array(
                'result' => "not_empty"
            ));
        }
    }

}
