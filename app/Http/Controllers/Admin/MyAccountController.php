<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MyAccount\ChangePasswordRequest;
use App\Http\Requests\Admin\MyAccount\KisiselBilgilerRequest;
use App\Http\Requests\Admin\MyAccount\ProfilResmiRequest;
use App\Mail\Admin\ChangePassword;
use App\Models\Admin\Users;
use Illuminate\Http\Request;
use Mail;
use Storage;

class MyAccountController extends Controller
{
    //

    function profile(){
        return view("admin.pages.my_profile.profile");
    }

    function activity(){
        return view("admin.pages.my_profile.activity");
    }

    function security(){
        return view("admin.pages.my_profile.security");
    }

    function notifications(){
        return view("admin.pages.my_profile.notifications");
    }

    function two_factor(Request $request){

        $findUser = Users::find(getCurrentUser()->id);
        if($findUser->hesap_onay == 1){

            if($findUser->iki_adimli == 0){
                $findUser->iki_adimli = 1;
            }else{
                $findUser->iki_adimli = 0;
            }
            $findUser->save();

            createLog("two_factor","İki faktörlü kimlik doğrulama değiştirildi");

            return redirect()->back()->with("success","Başarıyla etkinleştirildi !");

        }else{
            return redirect()->back()->with("error","Doğrulanmamış hesaplar bu özelliği kullanamaz !");
        }

    }

    function change_password(ChangePasswordRequest $request){

        $findUser = Users::find(getCurrentUser()->id);

        if(md5($request->eski_sifre) == $findUser->sifre){

            $findUser->sifre = md5($request->sifre);
            $findUser->save();

            $log = createLog("change_password","Şifre değiştirildi");

            if(checkNotification("change_password",$findUser->id)){
                createNotification("ni ni-shield-check","bg-success-dim",$log->ip." IP adresinden hesabınızın şifresi değiştirildi",$findUser->id);
                Mail::to($findUser->eposta)->send(new ChangePassword($findUser,$log->browser,$log->ip));
            }

            return redirect()->back()->with("success","Şifreniz başarıyla güncellendi !");

        }else{
            return redirect()->back()
                ->withErrors([
                    'eski_sifre' => ['Eski şifrenizi hatalı girdiniz !']
                ]);
        }

    }

    function log_kayit(Request $request){

        $findUser = Users::find(getCurrentUser()->id);
        if($findUser->log_kayit == 0){
            $findUser->log_kayit = 1;
        }else{
            $findUser->log_kayit = 0;
        }
        $findUser->save();

        createLog("users_log_kayit","Kullanıcı log kayit durumunu güncelledi.");

        return true;

    }

    function notification_save(Request $request){

        $findUser = Users::find(getCurrentUser()->id);

        if($findUser->notifications == null){

            $array = array($request->name);
            $array_encode = json_encode($array);

            $findUser->notifications = $array_encode;
            $findUser->save();

        }else{

            $array_decode = json_decode($findUser->notifications);

            if(in_array($request->name,$array_decode)){

                foreach ($array_decode as $k => $v){
                    if($v == $request->name){
                        unset($array_decode[$k]);
                    }
                }

                $array_decode = array_values($array_decode);

                $findUser->notifications = $array_decode;
                $findUser->save();

            }else{
                array_push($array_decode,$request->name);
            }

            $findUser->notifications = json_encode($array_decode);
            $findUser->save();

        }

        createLog("user_notifications","Bildirim ayarlarını değiştirdi");

        return true;

    }

    function profil_resmi_save(ProfilResmiRequest $request){

        $findUser = Users::find(getCurrentUser()->id);

        # ONLY (with request)
        if($request->hasFile('profil_resmi')){
            $file = $request->profil_resmi;
            $uploaded_file = Storage::disk("uploads")->put("admin/profile_pictures", $file);
            $findUser->profil_resmi = $uploaded_file;
        }

        $findUser->save();

        createLog("my_account","Profil resmi güncellendi");

        return redirect()->back()->with("success","Profil resmi başarıyla güncellendi !");

    }

    function adres_save(Request $request){

        $findUser = Users::find(getCurrentUser()->id);

        $findUser->adres = $request->adres;

        $findUser->save();

        createLog("my_account","Adres güncellendi");

        return redirect()->back()->with("success","Adres başarıyla güncellendi !");

    }

    function kisisel_bilgiler_save(KisiselBilgilerRequest $request){

        $newUser = Users::find(getCurrentUser()->id);

        # ONLY (with request)
        $newUser->ad = $request->ad;
        $newUser->soyad = $request->soyad;
        $newUser->telefon = $request->telefon;
        $newUser->dogum_tarihi = $request->dogum_tarihi;

        $newUser->save();

        createLog("my_account","Kişisel bilgiler güncellendi");

        return redirect()->back()->with("success","Kişisel bilgiler başarıyla güncellendi !");

    }

}
