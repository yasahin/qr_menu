<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\MyAccountController;
use App\Http\Controllers\Admin\MailController;
use App\Mail\Admin\AccountVerify;
use App\Mail\Admin\TwoFactor;
use App\Http\Controllers\Admin\AuthsController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MobileAPIController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WebController;

# DEFINE
$p = config("app.panel_prefix");

Route::get("/test",function (){
    return view("admin.emails.login_error");
});

Route::get("/",[WebController::class,'index'])->name("web.index");
Route::get("/discounts",[WebController::class,'discounts'])->name("web.discounts");
Route::get("/category/{id}",[WebController::class,'category'])->name("web.category");

# PRODUCTS PROCESS
Route::prefix($p.'products')->middleware("admin_user_login")->middleware("admin_auth_check")->group(function () {
    Route::get("create",[ProductsController::class,'create'])->name("qr_menu.products.create");
    Route::get("list",[ProductsController::class,'list'])->name("qr_menu.products.list");
    Route::post("create/store",[ProductsController::class,'store'])->name("qr_menu.products.create.store");
    Route::post("list/delete",[ProductsController::class,'delete'])->name("qr_menu.products.list.delete");
    Route::get("list/edit/{id}",[ProductsController::class,'edit'])->name("qr_menu.products.list.edit");
    Route::get("list/change_durum/{id}/{durum}",[ProductsController::class,'change_durum'])->name("qr_menu.products.list.change_durum");
    Route::post("list/edit_store",[ProductsController::class,'edit_store'])->name("qr_menu.products.list.edit_store");
});

# CATEGORİES PROCESS
Route::prefix($p.'categories')->middleware("admin_user_login")->middleware("admin_auth_check")->group(function () {
    Route::get("create",[CategoriesController::class,'create'])->name("qr_menu.categories.create");
    Route::post("create/store",[CategoriesController::class,'store'])->name("qr_menu.categories.create.store");
    Route::get("list",[CategoriesController::class,'list'])->name("qr_menu.categories.list");
    Route::post("list/delete",[CategoriesController::class,'delete'])->name("qr_menu.categories.list.delete");
    Route::get("list/edit/{id}",[CategoriesController::class,'edit'])->name("qr_menu.categories.list.edit");
    Route::post("list/edit_store",[CategoriesController::class,'edit_store'])->name("qr_menu.categories.list.edit_store");
});

# LOGIN PROCESS
Route::get($p,[LoginController::class,'index'])->name("admin.login");
Route::post($p.'login/logged',[LoginController::class,'logged'])->name("admin.login.logged");
Route::get($p.'login/user_exit',[LoginController::class,'user_exit'])->name("admin.login.user_exit");
# LOGIN PROCESS--FORGOT PASSWORD
Route::get($p."login/forgot_password",[LoginController::class,'forgot_password'])->name("admin.login.forgot_password");
Route::post($p."login/forgot_password/send",[LoginController::class,'forgot_password_send'])->name("admin.login.forgot_password.send");
# LOGIN PROCESS--TWO FACTOR
Route::get($p.'login/two_factor',[LoginController::class,'two_factor'])->name("admin.login.two_factor");
Route::get($p.'login/two_factor/resend',[LoginController::class,'two_factor_resend'])->name("admin.login.two_factor.resend");
Route::post($p.'login/two_factor/send',[LoginController::class,'two_factor_send'])->name("admin.login.two_factor_send");
Route::get($p.'login/two_factor/cancel',[LoginController::class,'two_factor_cancel'])->name("admin.login.two_factor_cancel");

# MAİL PROCESS--ACCOUNT VERIFY
Route::get($p."account_verify/{token}",[MailController::class,'account_verify'])->name("admin.account_verify");
# MAİL PROCESS--FORGOT PASSWORD & CHANGE PASSWORD
Route::get($p."change_password/{token}",[MailController::class,'change_password'])->name("admin.change_password");
Route::post($p."change_password/{token}/change",[MailController::class,'change_password_change'])->name("admin.change_password.change");

# HOME PROCESS
Route::get($p.'home',[HomeController::class,'index'])->name("admin.home")->middleware("admin_user_login");
Route::get($p.'home/send_account_verify_mail',[HomeController::class,'send_account_verify_mail'])->name("admin.home.send_account_verify_mail")->middleware("admin_user_login");
Route::post($p.'home/dark_mode_switch',[HomeController::class,'dark_mode_switch'])->name("admin.dark_mode_switch")->middleware("admin_user_login");
Route::post($p.'home/get_notifications',[HomeController::class,'get_notifications'])->name("admin.get_notifications")->middleware("admin_user_login");
Route::post($p.'home/read_all_notifications',[HomeController::class,'read_all_notifications'])->name("admin.read_all_notifications")->middleware("admin_user_login");

# NOTIFICATIONS PROCESS
Route::prefix($p.'notifications')->middleware("admin_user_login")->middleware("admin_auth_check")->group(function(){
    Route::get('create',[NotificationsController::class,'create'])->name("admin.notifications.create");
    Route::post('create/store',[NotificationsController::class,'store'])->name("admin.notifications.create.store");
});

# MY NOTIFICATIONS PROCESS
Route::prefix($p.'my_notifications')->middleware("admin_user_login")->middleware("admin_auth_check")->group(function(){
    Route::get('list',[NotificationsController::class,'list_to'])->name("admin.my_notifications.list");
    Route::get('list/unread',[NotificationsController::class,'list_unread'])->name("admin.my_notifications.list.unread");
    Route::get('list/unread/read',[NotificationsController::class,'list_unread_read'])->name("admin.my_notifications.list.unread.read");
    Route::get('list/read',[NotificationsController::class,'list_read'])->name("admin.my_notifications.list.read");
    Route::get('list/read/clear',[NotificationsController::class,'list_read_clear'])->name("admin.my_notifications.list.read.clear");
});

# USER ACTIVITIES PANEL BAKIM PROCESS
Route::prefix($p.'logs')->middleware("admin_user_login")->middleware("admin_auth_check")->group(function(){
    Route::get('list',[LogsController::class,'list'])->name("admin.logs.list");
    Route::post('list/delete_with_users',[LogsController::class,'delete_with_users'])->name("admin.logs.list.delete_with_users");
    Route::post('list/delete_with_tags',[LogsController::class,'delete_with_tags'])->name("admin.logs.list.delete_with_tags");
    Route::get('list/delete_all',[LogsController::class,'delete_all'])->name("admin.logs.list.delete_all");
});

# MY ACCOUNT PROCESS
Route::prefix($p.'my_account')->middleware("admin_user_login")->group(function(){
    # MY ACCOUNT PROCESS--PROFILE
    Route::get('profile',[MyAccountController::class,'profile'])->name("admin.my_account.profile");
    Route::post('profile/kisisel_bilgiler/save',[MyAccountController::class,'kisisel_bilgiler_save'])->name("admin.my_account.profile.kisisel_bilgiler.save");
    Route::post('profile/adres/save',[MyAccountController::class,'adres_save'])->name("admin.my_account.profile.adres.save");
    Route::post('profile/profil_resmi/save',[MyAccountController::class,'profil_resmi_save'])->name("admin.my_account.profile.profil_resmi.save");
    # MY ACCOUNT PROCESS--ACTIVITY
    Route::get('activity',[MyAccountController::class,'activity'])->name("admin.my_account.activity");
    # MY ACCOUNT PROCESS--SECURITY
    Route::get('security',[MyAccountController::class,'security'])->name("admin.my_account.security");
    Route::post('security/log_kayit',[MyAccountController::class,'log_kayit'])->name("admin.my_account.security.log_kayit");
    Route::post('security/change_password',[MyAccountController::class,'change_password'])->name("admin.my_account.security.change_password");
    Route::post('security/two_factor',[MyAccountController::class,'two_factor'])->name("admin.my_account.security.two_factor");
    # MY ACCOUNT PROCESS--NOTIFICATIONS
    Route::get('notifications',[MyAccountController::class,'notifications'])->name("admin.my_account.notifications");
    Route::post('notifications/save',[MyAccountController::class,'notification_save'])->name("admin.my_account.notifications.save");
});

# USERS PROCESS
Route::prefix($p.'users')->middleware("admin_user_login")->middleware("admin_auth_check")->group(function () {
    Route::get("create",[UsersController::class,'create'])->name("admin.users.create");
    Route::post("create/store",[UsersController::class,'store'])->name("admin.users.create.store");
    Route::get("list",[UsersController::class,'list'])->name("admin.users.list");
    Route::post("list/delete",[UsersController::class,'delete'])->name("admin.users.list.delete");
    Route::get("list/edit/{id}",[UsersController::class,'edit'])->name("admin.users.list.edit");
    Route::get("list/view/{id}/personal",[UsersController::class,'view'])->name("admin.users.list.view");
    Route::get("list/view/{id}/activity",[UsersController::class,'activity'])->name("admin.users.list.view.activity");
    Route::get("list/view/{id}/activity_clear",[UsersController::class,'activity_clear'])->name("admin.users.list.view.activity_clear");
    Route::get("list/view/{id}/change_state/{type}",[UsersController::class,'change_state'])->name("admin.users.list.view.change_state");
    Route::post("list/edit_store",[UsersController::class,'edit_store'])->name("admin.users.list.edit_store");
});

# AUTH PROCESS
Route::prefix($p.'auths')->middleware("admin_user_login")->middleware("admin_auth_check")->group(function () {
    Route::get("create",[AuthsController::class,'create'])->name("admin.auths.create");
    Route::post("create/store",[AuthsController::class,'store'])->name("admin.auths.create.store");
    Route::get("list",[AuthsController::class,'list'])->name("admin.auths.list");
    Route::get("list/edit/{id}",[AuthsController::class,'edit'])->name("admin.auths.list.edit");
    Route::post("list/edit_store",[AuthsController::class,'edit_store'])->name("admin.auths.list.edit_store");
    Route::post("list/delete",[AuthsController::class,'delete'])->name("admin.auths.list.delete");
});
