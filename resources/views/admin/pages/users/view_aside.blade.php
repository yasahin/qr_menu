<div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card user-card-s2">
                <div class="user-avatar lg bg-primary">
                    {!! $User->getProfilResmi() !!}
                </div>
                <div class="user-info">
                    <div class="badge badge-outline-light badge-pill ucap">{{ $User->auth->name }}</div>
                    <h5>{{ $User->getAdveSoyad() }}</h5>
                    <span class="sub-text">{{ $User->eposta }}</span>
                </div>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner card-inner-sm">
            <ul class="btn-toolbar justify-center gx-1">
                <li><a href="{{ route('admin.users.list.edit',$User->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Düzenle"><em class="icon ni ni-edit"></em></a></li>
                @if($User->id != getCurrentUser()->id)
                    <li><a href="javascript:;" class="btn btn-trigger btn-icon" onclick="Delete({{ $User->id }})" data-toggle="tooltip" data-placement="top" title="Sil"><em class="icon ni ni-trash"></em></a></li>
                @endif
            </ul>
        </div><!-- .card-inner -->
        <div class="card-inner card-inner-sm">
            <ul class="btn-toolbar justify-center gx-1">
                <li><a href="{{ route("admin.users.list.view.change_state",[$User->id,"hesap_onay"]) }}" class="btn btn-trigger btn-icon @if($User->hesap_onay == 1) text-success @else text-danger @endif" data-toggle="tooltip" data-placement="top" title="Hesap Durumunu Değiştir"><em class="icon ni ni-shield"></em></a></li>
                <li><a href="{{ route("admin.users.list.view.change_state",[$User->id,"log_kayit"]) }}" class="btn btn-trigger btn-icon @if($User->log_kayit == 1) text-success @else text-danger @endif" data-toggle="tooltip" data-placement="top" title="Log Kayıt Durumunu Değiştir"><em class="icon ni ni-save"></em></a></li>
                <li><a href="{{ route("admin.users.list.view.change_state",[$User->id,"iki_adimli"]) }}" class="btn btn-trigger btn-icon @if($User->iki_adimli == 1) text-success @else text-danger @endif" data-toggle="tooltip" data-placement="top" title="İki Faktörlü Kimlik Doğrulaması Durumunu Değiştir"><em class="icon ni ni-lock"></em></a></li>
            </ul>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <h6 class="overline-title-alt mb-2">Bazı Bilgiler</h6>
            <div class="row g-3">
                <div class="col-6">
                    <span class="sub-text">Kullanıcı ID:</span>
                    <span>{{ $User->id }}</span>
                </div>
                <div class="col-6">
                    <span class="sub-text">Son Giriş:</span>
                    <span>{{ getLastLogin($User->id) }}</span>
                </div>
                <div class="col-6">
                    <span class="sub-text">Hesap Durumu:</span>
                    @if($User->hesap_onay == 1)
                        <span class="lead-text text-success">Doğrulandı</span>
                    @else
                        <span class="lead-text text-danger">Doğrulanmadı</span>
                    @endif
                </div>
                <div class="col-6">
                    <span class="sub-text">Kayıt Tarihi:</span>
                    <span>{{ getDateTime($User->created_at) }}</span>
                </div>
                <div class="col-6">
                    <span class="sub-text">2F. Kimlik Doğrulama:</span>
                    @if($User->iki_adimli == 1)
                        <span class="lead-text text-success">Etkin</span>
                    @else
                        <span class="lead-text text-danger">Devre Dışı</span>
                    @endif
                </div>
                <div class="col-6">
                    <span class="sub-text">Hesap Hareketleri Kayıt:</span>
                    @if($User->log_kayit == 1)
                        <span class="lead-text text-success">Etkin</span>
                    @else
                        <span class="lead-text text-danger">Devre Dışı</span>
                    @endif
                </div>
            </div>
        </div><!-- .card-inner -->
    </div><!-- .card-inner -->
</div><!-- .card-aside -->
