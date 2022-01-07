<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\CategoriesUpdateRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //

    function create(){
        return view("qr_menu.categories.create");
    }

    function list(){
        return view("qr_menu.categories.list");
    }

    function delete(Request $request){
        $findCategory = Categories::find($request->id);
        createLog("categories",$findCategory->name." adındaki kategoriyi sistemden kaldırdı !");
        $findCategory->delete();

        return "ok";
    }

    function store(CategoriesCreateRequest $request){

        $newCategory = new Categories;

        # ONLY (with request)
        $newCategory->name = $request->name;

        $newCategory->save();

        createLog("category_create",$newCategory->name." adlı kategoriyi sisteme ekledi");

        return redirect()->back()->with("success","Kategori başarıyla oluşturuldu !");

    }

    function edit($id){
        $findCategory = Categories::find($id);
        return view("qr_menu.categories.edit")
            ->with("Category",$findCategory);
    }

    function edit_store(CategoriesUpdateRequest $request){

        $newCategory = Categories::find($request->id);

        # ONLY (with request)
        $newCategory->name = $request->name;

        $newCategory->save();

        createLog("category_update",$newCategory->name." adlı kategoriyi güncelledi !");

        return redirect()->back()->with("success","Kategori başarıyla güncellendi !");

    }

}
