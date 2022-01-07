<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auths\CreateRequest;
use App\Http\Requests\Admin\Auths\UpdateRequest;
use App\Models\Admin\Auths;
use Illuminate\Http\Request;

class AuthsController extends Controller
{
    //

    function create(){
        return view("admin.pages.auths.create");
    }

    function list(){
        return view("admin.pages.auths.list");
    }

    function edit($id){
        $findAuth = Auths::find($id);
        return view("admin.pages.auths.edit")
            ->with("Auth",$findAuth);
    }

    function delete(Request $request){

        $findAuth = Auths::find($request->id);
        createLog("auths",$findAuth->name." adındaki bir yetkiyi sistemden kaldırdı");
        $findAuth->delete();

        return "ok";

    }

    function edit_store(UpdateRequest $request){

        $newAuths = Auths::find($request->id);

        # ONLY (with request)
        $newAuths->name = $request->name;
        $newAuths->auths = json_encode($request->auths);

        $newAuths->save();

        createLog("auths",$newAuths->name." adındaki bir yetkiyi güncelledi");

        return redirect()->back()->with("success","Yetki başarıyla güncellendi !");

    }

    function store(CreateRequest $request){

        $newAuths = new Auths;

        # ONLY (with request)
        $newAuths->name = $request->name;
        $newAuths->auths = json_encode($request->auths);

        $newAuths->save();

        createLog("auths",$newAuths->name." adında bir yetki oluşturdu");

        return redirect()->back()->with("success","Yetki başarıyla oluşturuldu !");

    }

}
