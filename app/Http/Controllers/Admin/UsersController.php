<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Mail\Admin\AccountVerify;
use App\Models\Admin\Users;
use Illuminate\Http\Request;
use Mail;
use Ramsey\Uuid\Uuid;
use Storage;

class UsersController extends Controller
{
    //

    function create(){
        return view("admin.pages.users.create");
    }

    function list(){
        return view("admin.pages.users.list");
    }

    function view($id){
        $findUser = Users::find($id);
        if(!$findUser){
            return redirect(route('admin.users.list'));
        }
        return view("admin.pages.users.view")
            ->with("User",$findUser);
    }

    function change_state($id,$type){
        $findUser = Users::find($id);
        if(!$findUser){
            return redirect(route('admin.users.list'));
        }
        if($findUser->$type == 0){
            $findUser->$type = 1;
        }else{
            $findUser->$type = 0;
        }
        $findUser->save();

        createLog("users_change_state",$findUser->getAdveSoyad()." adlı kullanıcının hesap durumunu değiştirdi");

        return redirect()->back()->with("success","İşlem başarıyla gerçekleşti !");
    }

    function activity($id){
        $findUser = Users::find($id);
        if(!$findUser){
            return redirect(route('admin.users.list'));
        }
        return view("admin.pages.users.view_activity")
            ->with("User",$findUser);
    }

    function activity_clear($id){
        $findUser = Users::find($id);
        if(!$findUser){
            return redirect(route('admin.users.list'));
        }
        $findUser->activities()->delete();
        return redirect(route("admin.users.list.view.activity",$findUser->id))->with("success","Hareketler başarıyla temizlendi !");
    }

    function edit($id){
        $findUser = Users::find($id);
        return view("admin.pages.users.edit")
            ->with("User",$findUser);
    }

    function delete(Request $request){
        $findUser = Users::find($request->id);
        createLog("users",$findUser->getAdveSoyad()." adındaki kullanıcıyı sistemden kaldırdı");
        $findUser->delete();

        return "ok";
    }

    function edit_store(UpdateRequest $request){

        $newUser = Users::find($request->id);

        # ONLY (with request)
        $newUser->auth_id = $request->auth;
        $newUser->ad = $request->ad;
        $newUser->soyad = $request->soyad;
        $newUser->telefon = $request->telefon;
        $newUser->dogum_tarihi = $request->dogum_tarihi;
        $newUser->adres = $request->adres;
        $newUser->eposta = $request->eposta;

        if(!empty($request->sifre)){
            $newUser->sifre = md5($request->sifre);
        }

        # OPTION (with request)
        if($request->hasFile('profil_resmi')){
            $file = $request->profil_resmi;
            $uploaded_file = Storage::disk("uploads")->put("admin/profile_pictures", $file);
            $newUser->profil_resmi = $uploaded_file;
        }

        # REQUIRED (without request)
        $newUser->token = GenerateUserToken();

        $newUser->save();

        createLog("users_update",$newUser->getAdveSoyad()." adlı kullanıcıyı güncelledi");

        return redirect()->back()->with("success","Kullanıcı başarıyla güncelledi !");

    }

    function store(CreateRequest $request){

        $newUser = new Users;

        # ONLY (with request)
        $newUser->auth_id = $request->auth;
        $newUser->ad = $request->ad;
        $newUser->soyad = $request->soyad;
        $newUser->telefon = $request->telefon;
        $newUser->dogum_tarihi = $request->dogum_tarihi;
        $newUser->adres = $request->adres;
        $newUser->eposta = $request->eposta;
        $newUser->sifre = md5($request->sifre);

        # OPTION (with request)
        if($request->hasFile('profil_resmi')){
            $file = $request->profil_resmi;
            $uploaded_file = Storage::disk("uploads")->put("admin/profile_pictures", $file);
            $newUser->profil_resmi = $uploaded_file;
        }

        # REQUIRED (without request)
        $newUser->token = GenerateUserToken();

        $newUser->save();

        createLog("user_create",$newUser->getAdveSoyad()." adlı kullanıcıyı sisteme ekledi");

        return redirect()->back()->with("success","Kullanıcı başarıyla oluşturuldu !");

    }

}
