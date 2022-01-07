<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Users extends Model
{
    use HasFactory;

    protected $table = 'admin_users';

    public function getAdveSoyad(){
        return $this->ad." ".$this->soyad;
    }

    public function notifications(){
        return $this->hasMany("App\Models\Admin\UsersNotifications","user_id","id")->orderBy("created_at","DESC");
    }

    public function activities(){
        return $this->hasMany("App\Models\Admin\UsersActivities","user_id","id")->orderBy("created_at","DESC");
    }

    public function auth(){
        return $this->hasOne("App\Models\Admin\Auths","id","auth_id");
    }

    public function getProfilResmi($type = "normal"){

        if($this->profil_resmi != null){

            return '<img src="'.Storage::disk("uploads")->url($this->profil_resmi).'" width="100%" height="100%" alt="'.$this->getAdveSoyad().'">';

        }else{

            $exp = explode(" ",$this->getAdveSoyad());

            if(count($exp) > 2){
                $one = mb_substr($exp[0],0,1);
                $two = mb_substr($exp[count($exp) - 1],0,1);

                if($type == "normal"){
                    return '<span>'.$one.$two.'</span>';
                }else if($type == "sm"){
                    return '<em class="icon ni ni-user-alt"></em>';
                }

            }else{
                $one = mb_substr($exp[0],0,1);
                $two = mb_substr($exp[1],0,1);

                if($type == "normal"){
                    return '<span>'.$one.$two.'</span>';
                }else if($type == "sm"){
                    return '<em class="icon ni ni-user-alt"></em>';
                }

            }

        }

    }

}
