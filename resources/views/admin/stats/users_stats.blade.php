<div class="card h-100">
    <div class="card-inner">
        <div class="card-title-group mb-2">
            <div class="card-title">
                <h6 class="title">Kullanıcı İstatistikleri</h6>
            </div>
        </div>
        <ul class="nk-store-statistics">
            <li class="item">
                <div class="info">
                    <div class="title">Yetkiler</div>
                    <div class="count">{{ count(getAllAuths()) }}</div>
                </div>
                <em class="icon bg-pink-dim ni ni-security"></em>
            </li>
            <li class="item">
                <div class="info">
                    <div class="title">Kullanıcılar</div>
                    <div class="count">{{ count(getAllUsers()) }}</div>
                </div>
                <em class="icon bg-info-dim ni ni-users"></em>
            </li>
            <li class="item">
                <div class="info">
                    <div class="title">Hareketler</div>
                    <div class="count">{{ getAllActivitiesCount() }}</div>
                </div>
                <em class="icon bg-purple-dim ni ni-activity-alt"></em>
            </li>
            <li class="item">
                <div class="info">
                    <div class="title">Okunmamış Bildirimler</div>
                    <div class="count">{{ getAllUnReadNotificationsCount() }}</div>
                </div>
                <em class="icon bg-primary-dim ni ni-bell"></em>
            </li>
        </ul>
    </div><!-- .card-inner -->
</div>
