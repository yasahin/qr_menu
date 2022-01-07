<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('admin.home') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('admin/images/logo.png') }}" srcset="{{ asset('admin/images/logo2x.png') }} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('admin/images/logo-dark.png') }}" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <!-- ICON TEST -->
                    <em class="icon ni ni-package" style="display: none;"></em>
                    @foreach(config("menu") as $menuGroupKey => $menuGroup)
                        @php $my_auth = json_decode(getCurrentUser()->auth->auths); @endphp
                            @if(mainMenuGroupMenuandSubMenuSearch($menuGroup,$my_auth))
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">{{ $menuGroupKey }}</h6>
                                </li><!-- .nk-menu-item -->
                            @endif
                        @if(count($menuGroup) > 0)
                            @foreach($menuGroup as $mainMenuKey => $mainMenu)
                                @if(@$mainMenu['sub'] && mainMenuSubSearch($mainMenu['sub'],$my_auth))
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="{{ $mainMenu["icon"] }}"></em></span>
                                            <span class="nk-menu-text">{{ $mainMenu["title"] }}</span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            @foreach($mainMenu['sub'] as $subMenuKey => $subMenu)
                                                @if(in_array("menu_".$subMenu['id'],$my_auth))
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route($subMenu['route']) }}" class="nk-menu-link"><span class="nk-menu-text">{{ $subMenu['title'] }}</span></a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul><!-- .nk-menu-sub -->
                                    </li><!-- .nk-menu-item -->
                                    @else
                                        @if(in_array("menu_".@$mainMenu['id'],$my_auth))
                                            <li class="nk-menu-item">
                                                <a href="{{ route($mainMenu['route']) }}" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="{{ $mainMenu["icon"] }}"></em></span>
                                                    <span class="nk-menu-text">{{ $mainMenu["title"] }}</span>
                                                    @if($mainMenu['route'] == "admin.my_notifications.list")
                                                        <span class="nk-menu-badge badge-primary MenuNotificationsCount">0</span>
                                                    @endif
                                                </a>
                                            </li><!-- .nk-menu-item -->
                                        @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
