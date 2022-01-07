<!-- main header @s -->
<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img" src="{{ asset('admin/images/logo-small.png') }}" srcset="{{ asset('admin/images/logo-small2x.png') }} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('admin/images/logo-dark-small.png') }}" srcset="{{ asset('admin/images/logo-dark-small2x.png') }} 2x" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li>
                        <div class="spinner-border spinner-border-sm text-primary" id="GenelSpinner" style="display: none;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </li>
                    <li>
                        <span id="HeaderDate"></span> <b id="HeaderHourMinute" class="text-primary"></b> <small id="HeaderSecond"></small>
                    </li>
                    <li class="dropdown notification-dropdown">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="icon-status icon-status-na" id="MyNotificationStatus"><em class="icon ni ni-bell"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Bildirimler (<span class="MenuNotificationsCount">0</span>)</span>
                                <a href="javascript:;" onclick="readAllMyNotifications()">Tümünü okundu işaretle</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification" id="MyNotifications">

                                </div><!-- .nk-notification -->
                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="{{ route("admin.my_notifications.list") }}">Tümünü Göster</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    {!! getCurrentUser()->getProfilResmi("sm") !!}
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    @if(getCurrentUser()->hesap_onay == 0)
                                        <div class="user-status user-status-unverified">Doğrulanmadı</div>
                                        @else
                                        <div class="user-status user-status-verified">Doğrulandı</div>
                                    @endif
                                    <div class="user-name dropdown-indicator">{{ getCurrentUser()->getAdveSoyad() }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        {!! getCurrentUser()->getProfilResmi("normal") !!}
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ getCurrentUser()->getAdveSoyad() }}</span>
                                        <span class="sub-text">{{ getCurrentUser()->eposta }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('admin.my_account.profile') }}"><em class="icon ni ni-user-alt"></em><span>Kişisel Ayarlar</span></a></li>
                                    <li><a href="{{ route("admin.my_account.security") }}"><em class="icon ni ni-lock-alt"></em><span>Güvenlik Ayarları</span></a></li>
                                    <li><a href="{{ route("admin.my_account.activity") }}"><em class="icon ni ni-activity-alt"></em><span>Hareketlerim</span></a></li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Karanlık Mod</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('admin.login.user_exit') }}"><em class="icon ni ni-signout"></em><span>Çıkış Yap</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
<!-- main header @e -->
