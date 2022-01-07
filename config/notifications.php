<?php

# KULLANICILARIN BİLDİRİM AYARLARININ TANIMLANDIĞI BÖLÜM
# BURADAN BİLDİRİM AYARI EKLENEBİLİR.
# EKLENEN BİLDİRİM AYARI AYNI ZAMANDADA [admin/pages/notifications.blade.php]'DEN KONTROL EDİLMELİDİR. (EĞER BİR AYAR GRUBUNA SAHİP İSE)
return [
    "guvenlik" => [
        "login_error" => [ "title" => "Hesabıma hatalı giriş denemesi olduğunda bilgilendirilmek istiyorum" ],
        "change_password" => [ "title" => "Hesabımın şifresi değiştirildiğinde bilgilendirilmek istiyorum" ]
    ],
    "sistem" => [
        "admin_send_notifications" => [ "title" => "Sistem yöneticilerinden bildirim almak istiyorum" ]
    ],
    "yenilik" => [
        "new_system_update_products" => [ "title" => "Yeni ürünler ve sistem güncellemeleri konusunda beni bilgilendir" ],
        "news_ads" => [ "title" => "Tanıtım amaçlı bildirimler almak istiyorum" ]
    ],
];
