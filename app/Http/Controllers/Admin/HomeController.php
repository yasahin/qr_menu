<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Admin\AccountVerify;
use App\Models\Admin\Users;
use App\Models\Admin\UsersNotifications;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    //

    function index(){
        return view("admin.pages.home");
    }

    function send_account_verify_mail(){

        # SENDING ACCOUNT VERIFY MAIL
        Mail::to(getCurrentUser()->eposta)->send(new AccountVerify(getCurrentUser()));

        return redirect()->back();

    }

    function get_notifications(Request $request){

        $findNotifications = Users::find(getCurrentUser()->id);

        return json_encode(
            $findNotifications->notifications()->where("read_state","=",0)->get()
        );

    }

    function read_all_notifications(Request $request){

        $findNotifications = Users::find(getCurrentUser()->id);

        foreach ($findNotifications->notifications()->get() as $ntf){

            $find = UsersNotifications::find($ntf->id);
            $find->read_state = 1;
            $find->save();

        }

        createLog("read_notifications","Tüm bildirimlerini okundu olarak işaretledi");

        return true;

    }

    function dark_mode_switch(Request $request){

        # KARANLIK MOD DEĞİŞTİRME
        # admin/assets/js/scripts.js
        # FIND TO -> [dark-mode-switch-ajax]

        $findUser = Users::find($request->current_user_id);
        $findUser->darkmode = $request->dark_mode_state;
        $findUser->save();
        createLog("user_darkmode","Karanlık modu değiştirdi");
        return true;

    }

}
