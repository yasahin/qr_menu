<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    //

    function list(){
        return view("qr_menu.products.list");
    }

    function change_durum($id,$durum){
        $findCategory = Products::find($id);
        if($durum == 0){
            $findCategory->durum = 1;
            $findCategory->save();
        }else{
            $findCategory->durum = 0;
            $findCategory->save();
        }
        return redirect()->back()->with("success","Ürün yayın durumu değiştirildi !");
    }

    function create(){
        return view("qr_menu.products.create");
    }

    function delete(Request $request){
        $findCategory = Products::find($request->id);
        createLog("products",$findCategory->name." adındaki ürünü sistemden kaldırdı !");
        $findCategory->delete();

        return "ok";
    }

    function store(ProductsCreateRequest $request){

        $newUser = new Products;

        # ONLY (with request)
        $newUser->category_id = $request->category_id;
        $newUser->name = $request->name;
        $newUser->desc = $request->desc;
        $newUser->price = $request->price;
        $newUser->sale_price = $request->sale_price;

        # OPTION (with request)
        if($request->hasFile('picture')){
            $file = $request->picture;
            $uploaded_file = Storage::disk("uploads")->put("admin/products", $file);
            $newUser->picture = $uploaded_file;
        }

        # REQUIRED (without request)

        $newUser->save();

        createLog("product_create",$newUser->name." adlı ürünü sisteme ekledi");

        return redirect()->back()->with("success","Ürün başarıyla oluşturuldu !");

    }

    function edit($id){
        $findCategory = Products::find($id);
        return view("qr_menu.products.edit")
            ->with("Product",$findCategory);
    }

    function edit_store(ProductUpdateRequest $request){

        $newCategory = Products::find($request->id);

        # ONLY (with request)
        $newCategory->category_id = $request->category_id;
        $newCategory->name = $request->name;
        $newCategory->desc = $request->desc;
        $newCategory->price = $request->price;
        $newCategory->sale_price = $request->sale_price;

        # OPTION (with request)
        if($request->hasFile('picture')){
            $file = $request->picture;
            $uploaded_file = Storage::disk("uploads")->put("admin/products", $file);
            $newCategory->picture = $uploaded_file;
        }

        # REQUIRED (without request)
        $newCategory->save();

        createLog("product_update",$newCategory->name." adlı ürünü güncelledi !");

        return redirect()->back()->with("success","Ürün başarıyla güncellendi !");

    }

}
