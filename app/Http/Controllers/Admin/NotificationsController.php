<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notifications\CreateRequest;
use App\Models\Admin\UsersNotifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    //

    function create(){
        return view("admin.pages.notifications.create");
    }

    function store(CreateRequest $request){

        foreach ($request->users as $user){

            $newNtf = new UsersNotifications;

            $newNtf->user_id = $user;
            $newNtf->icon = $request->icon;
            $newNtf->renk = $request->renk;
            $newNtf->content = $request->contents;
            $newNtf->read_state = 0;

            $newNtf->save();

            createLog("send_notification","Seçili kullanıcılara bildirim gönderdi");

        }

        return redirect()->back()->with("success","Seçili kullanıcılara bildirim başarıyla gönderildi !");

    }

    function list_to(){
        if(getAllUnReadNotificationsCount() > 0){
            return redirect(route('admin.my_notifications.list.unread'));
        }else{
            return redirect(route('admin.my_notifications.list.read'));
        }
    }

    function list_read_clear(){

        $getAllNtf = UsersNotifications::where("user_id","=",getCurrentUser()->id)->where("read_state","=",1)->get();
        foreach ($getAllNtf as $ntf){
            $ntf->delete();
        }

        return redirect()->back()->with("success","Başarıyla tüm okunmuş bildirimler temizlendi !");

    }

    function list_unread_read(){

        $getAllNtf = UsersNotifications::where("user_id","=",getCurrentUser()->id)->where("read_state","=",0)->get();
        foreach ($getAllNtf as $ntf){
            $ntf->read_state = 1;
            $ntf->save();
        }

        return redirect()->back()->with("success","Başarıyla tüm bildirimler okundu olarak işaretlendi !");

    }

    function list_unread(){
        return view("admin.pages.notifications.my_notifications_unread");
    }
    function list_read(){
        return view("admin.pages.notifications.my_notifications_read");
    }

}
