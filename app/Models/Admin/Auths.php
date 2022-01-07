<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auths extends Model
{
    use HasFactory;

    protected $table = "admin_auths";

    public function authsCount(){
        $array = json_decode($this->auths);
        return count($array);
    }

    public function users(){
        return $this->hasMany("App\Models\Admin\Users","auth_id","id");
    }

}
