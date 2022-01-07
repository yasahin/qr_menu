<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Mail\Admin\ChangePassword;
use App\Models\Admin\Users;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    //

    function change_password($token){

        $findUser = Users::where("token","=",$token)->first();
        if($findUser){

            return view("admin.change_password")
                ->with("user_token",$token);

        }else{
            return redirect(route("admin.login"))->withErrors([
                "custom" => "Bu bağlantının süresi dolmuş !"
            ]);
        }
    }

    function change_password_change(ChangePasswordRequest $request){

        $findUser = Users::where("token","=",$request->user_token)->first();
        if($findUser){

            $findUser->sifre = md5($request->sifre);
            $findUser->token = GenerateUserToken();
            $findUser->save();

            $log = createLog("forgot_change_password","Şifresini sıfırladı",$findUser->id);

            if(checkNotification("change_password",$findUser->id)){
                createNotification("ni ni-shield-check","bg-success-dim",$log->ip." IP adresinden hesabınızın şifresi sıfırlandı",$findUser->id);
                Mail::to($findUser->eposta)->send(new ChangePassword($findUser,$log->browser,$log->ip));
            }

            return redirect(route("admin.login"))->with("success","Şifreniz başarıyla değiştirildi. Lütfen giriş yapınız !");

        }else{
            return redirect(route("admin.login"))->withErrors([
                "custom" => "Bu bağlantının süresi dolmuş !"
            ]);
        }

    }

    function account_verify($token){

        $findUser = Users::where("token","=",$token)->first();

        if($findUser){

            $findUser->hesap_onay = 1;
            $findUser->token = GenerateUserToken();
            $findUser->save();

            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }

            $_SESSION['CURRENT_USER'] = $findUser;

            createLog("account_verify","Kullanıcı hesabı onaylandı");

            return redirect(route('admin.home'));

        }else{
            # BAĞLANTININ SÜRESİ DOLMUŞ
            # TODO BURAYA ERROR SAYFASI YAPILMASI GEREK
            return redirect(route('admin.login'));
        }

    }

}
