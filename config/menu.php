<?php

return [

    "GENEL BAKIŞ" => [
        [
            "id" => 1,
            "route" => 'admin.home',
            "title" => "Ana Sayfa",
            "icon" => "icon ni ni-home-fill"
        ]
    ],
    "ÜRÜN YÖNETİMİ" => [
        [
            "title" => "Ürünler",
            "icon" => "icon ni ni-package",
            "sub" => [
                [ "id" => 11, "route" => 'qr_menu.products.create', "title" => "Oluştur"],
                [ "id" => 12, "route" => 'qr_menu.products.list', "title" => "Liste"]
            ]
        ]
    ],
    "KATEGORİ YÖNETİMİ" => [
        [
            "title" => "Kategoriler",
            "icon" => "icon ni ni-bookmark",
            "sub" => [
                [ "id" => 9, "route" => 'qr_menu.categories.create', "title" => "Oluştur"],
                [ "id" => 10, "route" => 'qr_menu.categories.list', "title" => "Liste"]
            ]
        ]
    ],
    "PANEL BİLEŞENLERİ" => [
        [
            "id" => 6,
            "route" => 'admin.notifications.create',
            "title" => "Bildirim Gönder",
            "icon" => "icon ni ni-send"
        ],
        [
            "id" => 8,
            "route" => 'admin.my_notifications.list',
            "title" => "Bildirimlerim",
            "icon" => "icon ni ni-bell"
        ],
    ],
    "PANEL YÖNETİMİ" => [
        [
            "title" => "Kullanıcılar",
            "icon" => "icon ni ni-users-fill",
            "sub" => [
                [ "id" => 2, "route" => 'admin.users.create', "title" => "Oluştur"],
                [ "id" => 3, "route" => 'admin.users.list', "title" => "Liste"]
            ]
        ],
        [
            "title" => "Yetkiler",
            "icon" => "icon ni ni-security",
            "sub" => [
                [ "id" => 4, "route" => 'admin.auths.create', "title" => "Oluştur"],
                [ "id" => 5, "route" => 'admin.auths.list', "title" => "Liste"]
            ]
        ]
    ],
    "PANEL BAKIM" => [
        [
            "id" => 7,
            "route" => 'admin.logs.list',
            "title" => "Hareketler",
            "icon" => "icon ni ni-activity"
        ]
    ]

    //last_id = [12] + 1

];
