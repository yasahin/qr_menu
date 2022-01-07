<?php

namespace Database\Seeders;

use App\Models\Admin\Auths;
use Illuminate\Database\Seeder;

class AuthsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $newAuth = new Auths;
        $newAuth->name = "Yönetici";
        $newAuth->auths = '["menu_1","menu_6","menu_2","menu_3","menu_4","menu_5","auth_users_stats"]';
        $newAuth->save();

    }
}
