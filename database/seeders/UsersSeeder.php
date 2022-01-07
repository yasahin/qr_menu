<?php

namespace Database\Seeders;

use App\Models\Admin\Auths;
use App\Models\Admin\Users;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $newUser = new Users;

        $newUser->token = GenerateUserToken();
        $newUser->auth_id = Auths::first()->id;
        $newUser->log_kayit = 1;
        $newUser->iki_adimli = 0;
        $newUser->hesap_onay = 0;
        $newUser->darkmode = 0;
        $newUser->eposta = "ozgurnow@gmail.com";
        $newUser->sifre = md5("Bestof97*44");
        $newUser->profil_resmi = null;
        $newUser->ad = "Özgür";
        $newUser->soyad = "TAYFUR";
        $newUser->telefon = "05448990117";
        $newUser->dogum_tarihi = "06.09.1997";
        $newUser->adres = "Tecde Mah. Biga Sok. No : 5/A Tayfa Creative , Yeşilyurt/MALATYA";
        $newUser->dil = "tr";
        $newUser->tarih_formati = "d.m.Y";
        $newUser->zaman_dilimi = "Europe/Istanbul";
        $newUser->notifications = '["admin_send_notifications"]';

        $newUser->save();

    }
}
