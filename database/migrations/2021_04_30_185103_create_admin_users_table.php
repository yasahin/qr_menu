<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->text("token")->unique();
            $table->bigInteger("auth_id")->unsigned();
            $table->integer("log_kayit")->default(1);
            $table->integer("iki_adimli")->default(0);
            $table->integer("hesap_onay")->default(0);
            $table->integer("darkmode")->default(0);
            $table->string("eposta",200)->unique();
            $table->text("sifre");
            $table->text("profil_resmi")->nullable();
            $table->string("ad",255);
            $table->string("soyad",255);
            $table->string("telefon",100)->unique();
            $table->string("dogum_tarihi",100)->nullable();
            $table->text("adres")->nullable();
            $table->string("dil",100)->default("tr");
            $table->string("tarih_formati",150)->default("d.m.Y");
            $table->string("zaman_dilimi",200)->default("Europe/Istanbul");
            $table->text("notifications")->nullable();
            $table->timestamps();

            $table->foreign("auth_id")
                ->references("id")
                ->on("admin_auths")
                ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_users');
    }
}
