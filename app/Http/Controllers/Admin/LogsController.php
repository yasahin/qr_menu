<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Logs\DeleteWithTagsRequest;
use App\Http\Requests\Admin\Logs\DeleteWithUsersRequest;
use App\Models\Admin\Users;
use App\Models\Admin\UsersActivities;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    //

    function list(){

        $UserActivities = UsersActivities::orderBy("id","DESC")->get();

        $collect = collect($UserActivities);
        $uniqueData = $collect->unique("tag")->values()->all();

        return view("admin.pages.logs.list")
            ->with("Logs",$UserActivities)
            ->with("Tags",$uniqueData);
    }

    function delete_all(){

        $gets = UsersActivities::get();
        foreach ($gets as $get){
            $get->delete();
        }

        return redirect()->back()->with("success","Tüm hareketler başarıyla temizlendi !");

    }

    function delete_with_tags(DeleteWithTagsRequest $request){

        foreach ($request->tags as $tag){

            $gets = UsersActivities::where("tag","=",$tag)->get();
            foreach ($gets as $get){
                $get->delete();
            }

        }

        return redirect()->back()->with("success","Seçili etiketlerin hareketleri başarıyla silindi !");

    }

    function delete_with_users(DeleteWithUsersRequest $request){

        foreach ($request->users as $user){

            $findUser = Users::find($user);
            $findUser->activities()->delete();

        }

        return redirect()->back()->with("success","Seçili kullanıcıların hareketleri başarıyla silindi !");

    }

}
