<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Mail\Admin\ForgotPassword;
use App\Mail\Admin\LoginError;
use App\Mail\Admin\TwoFactor;
use App\Models\Admin\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class LoginController extends Controller
{
    //

    function forgot_password(){
        return view("admin.forgot_password");
    }

    function forgot_password_send(Request $request){

        $findUser = Users::where("eposta","=",$request->eposta)->first();
        if($findUser){

            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = config("app.recaptcha_secret_key");
            $recaptcha_response = $request->recaptcha_response;

            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            if(@$recaptcha->score >= 0.5){

                Mail::to($findUser->eposta)->send(new ForgotPassword($findUser));
                createLog("forgot_password","Şifre sıfırlama isteği oluşturdu",$findUser->id);
                return redirect(route("admin.login"))->with("success","E-Posta adresinize şifrenizi sıfırlamanız için bir bağlantı gönderdik !");

            }else{

                createLog("user_login_forgot_password_recaptcha","Bir robot hesabınızın şifresini değiştirmeye çalıştı",$findUser->id);
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'custom' => ['Lütfen robot olmadığınızı doğrulayınız !']
                    ]);

            }

        }else{
            return redirect()->back()->withErrors([
                "eposta" => "Böyle bir kullanıcı bulunamadı !"
            ]);
        }

    }

    function index(){
        session_start();
        if(@$_SESSION['TWO_FACTOR']){
            return redirect(route("admin.login.two_factor"));
        }
        if(@$_SESSION['CURRENT_USER']){
            return redirect(route("admin.home"));
        }
        return view("admin.login");
    }

    function two_factor(){
        session_start();
        if(@$_SESSION['TWO_FACTOR']){
            return view("admin.two_factor");
        }else{
            return redirect(route("admin.login"));
        }
    }

    function two_factor_resend(){

        session_start();
        $findUser = Users::find($_SESSION['TWO_FACTOR']->id);
        $_SESSION['TWO_FACTOR'] = $findUser;
        $_SESSION['TWO_FACTOR']->starttimestamp = Carbon::now()->timestamp;
        Mail::to($findUser->eposta)->send(new TwoFactor($findUser));
        return redirect()->back();

    }

    function two_factor_cancel(){

        session_start();
        session_destroy();
        return redirect(route("admin.login"));

    }

    function two_factor_send(Request $request){

        session_start();

        $two_factor_code = $request->two_factor_code;
        $get_cache_two_factor_code = \Cache::get($_SESSION['TWO_FACTOR']->token);

        if($two_factor_code == $get_cache_two_factor_code && !empty($two_factor_code)){

            $USER = $_SESSION['TWO_FACTOR'];
            session_destroy();
            \Cache::forget($USER->token);

            session_start();
            $_SESSION['CURRENT_USER'] = $USER;
            createLog("user_login","Sisteme giriş yaptı");
            return redirect(route('admin.home'));

        }else{

            $log = createLog("user_login","İki faktörlü kimlik doğrulaması hatalı giriş",$_SESSION['TWO_FACTOR']->id);

            if(checkNotification("login_error",$_SESSION['TWO_FACTOR']->id)){
                createNotification("ni ni-shield-off","bg-danger-dim",$log->ip." IP adresinden hesabınıza hatalı giriş denemesi yapıldı",$_SESSION['TWO_FACTOR']->id);
                Mail::to($_SESSION['TWO_FACTOR']->eposta)->send(new LoginError($_SESSION['TWO_FACTOR'],$log->browser,$log->ip));
            }

            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'two_factor_code' => ['Girilen kod geçerli bir kod değil !']
                ]);
        }

    }

    function logged(LoginRequest $request){

        $find = Users::where("eposta","=",$request->eposta)->first();

        if($find){

            if($find->sifre == md5($request->sifre)){

                $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                $recaptcha_secret = config("app.recaptcha_secret_key");
                $recaptcha_response = $request->recaptcha_response;

                $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                $recaptcha = json_decode($recaptcha);

                if(@$recaptcha->score >= 0.5){

                    //GİRİŞ BAŞARILI
                    if($find->iki_adimli == 1){

                        session_start();
                        $_SESSION['TWO_FACTOR'] = $find;
                        $_SESSION['TWO_FACTOR']->starttimestamp = Carbon::now()->timestamp;

                        Mail::to($find->eposta)->send(new TwoFactor($find));
                        return redirect(route('admin.login.two_factor'));

                    }else{
                        session_start();
                        $_SESSION['CURRENT_USER'] = $find;
                        createLog("user_login","Sisteme giriş yaptı");
                        return redirect(route('admin.home'));
                    }

                }else{
                    createLog("user_login_recaptcha","Bir robot hesabınıza erişmeye çalıştı",$find->id);
                    createNotification("ni ni-network","bg-danger-dim","Bir robot hesabınıza erişmeye çalıştı",$find->id);
                    return redirect()->back()
                        ->withInput()
                        ->withErrors([
                            'custom' => ['Lütfen robot olmadığınızı doğrulayınız !']
                        ]);
                }

            }else{
                //ŞİFRE DOĞRU DEĞİL
                $log = createLog("user_login","Hatalı giriş denemesi",$find->id);
                if(checkNotification("login_error",$find->id)){
                    createNotification("ni ni-shield-off","bg-danger-dim",$log->ip." IP adresinden hesabınıza hatalı giriş denemesi yapıldı",$find->id);
                    Mail::to($find->eposta)->send(new LoginError($find,$log->browser,$log->ip));
                }

                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                    'sifre' => ['Şifreniz doğru değil !']
                ]);
            }

        }else{
            //KULLANICI BULUNAMADI
            return redirect()->back()
                ->withInput()
                ->withErrors([
                'eposta' => ['Böyle bir kullanıcı kayıtlı değil !']
            ]);
        }

    }

    function user_exit(){
        session_start();
        createLog("user_login","Sistemden çıkış yaptı");
        session_destroy();
        return redirect(route('admin.login'));
    }

}
