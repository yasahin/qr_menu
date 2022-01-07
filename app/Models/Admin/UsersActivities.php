<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersActivities extends Model
{
    use HasFactory;

    protected $table = "admin_users_activities";

    public function user(){
        return $this->hasOne("App\Models\Admin\Users","id","user_id");
    }

}
