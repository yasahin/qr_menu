<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersNotifications extends Model
{

    use HasFactory;

    protected $table = "admin_users_notifications";

    protected $appends = array('diffCreatedDate');

    public function getdiffCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

}
