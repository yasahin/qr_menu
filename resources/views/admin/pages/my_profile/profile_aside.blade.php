<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card">
                <div class="user-avatar bg-primary">
                    {!! getCurrentUser()->getProfilResmi() !!}
                </div>
                <div class="user-info">
                    <span class="lead-text">{{ getCurrentUser()->getAdveSoyad() }}</span>
                    <span class="sub-text">{{ getCurrentUser()->eposta }}</span>
                </div>
                <form action="{{ route('admin.my_account.profile.profil_resmi.save') }}" id="profilResmiForm" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" onchange="document.getElementById('profilResmiForm').submit();" id="profil_resmi" name="profil_resmi" style="display: none;">
                </form>
                <div class="user-action">
                    <div class="dropdown">
                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li>
                                    <a href="javascript:;" onclick="document.getElementById('profil_resmi').click();">
                                        <em class="icon ni ni-camera-fill"></em><span>Profil Fotoğrafı</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .user-card -->
        </div><!-- .card-inner -->
        <div class="card-inner p-0">
            <ul class="link-list-menu">
                <li><a class="@if($sayfa == 'profilim') active @endif" href="{{ route('admin.my_account.profile') }}"><em class="icon ni ni-user-fill-c"></em><span>Kişisel Ayarlarım</span></a></li>
                <li><a class="@if($sayfa == 'bildirimler') active @endif" href="{{ route('admin.my_account.notifications') }}"><em class="icon ni ni-bell-fill"></em><span>Bildirim Ayarları</span></a></li>
                <li><a class="@if($sayfa == 'hesap_hareketleri') active @endif" href="{{ route('admin.my_account.activity') }}"><em class="icon ni ni-activity-round-fill"></em><span>Hesap Hareketleri</span></a></li>
                <li><a class="@if($sayfa == 'guvenlik_ayarlari') active @endif" href="{{ route('admin.my_account.security') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Güvenlik Ayarları</span></a></li>
            </ul>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- card-aside -->
