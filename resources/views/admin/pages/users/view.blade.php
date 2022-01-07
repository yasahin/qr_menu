@extends('admin.layouts.default')
@section('title') Kullanıcılar / {{ $User->getAdveSoyad() }} @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Kullanıcılar / <strong class="text-primary small">{{ $User->getAdveSoyad() }}</strong></h3>
                    <div class="nk-block-des text-soft">
                        <ul class="list-inline">
                            <li>Kullanıcı ID: <span class="text-base">{{ $User->id }}</span></li>
                            <li>Son giriş: <span class="text-base">{{ getLastLogin($User->id) }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.users.list') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Geri Dön</span></a>
                    <a href="{{ route('admin.users.list') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        @include('admin.parts.success_custom')
        <div class="nk-block">
            <div class="card">
                <div class="card-aside-wrap">
                    <div class="card-content">
                        @include('admin.pages.users.view_menu')
                        <div class="card-inner">
                            <div class="nk-block">
                                <div class="nk-block-head">
                                    <h5 class="title">Kişisel Bilgiler</h5>
                                    <p>{{ config("app.name") }} içerisinde kullanılacak ad,soyad ve e-posta adresi gibi temel bilgiler.</p>
                                </div><!-- .nk-block-head -->
                                <div class="profile-ud-list">
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Yetki</span>
                                            <span class="profile-ud-value">{{ $User->auth->name }}</span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Ad</span>
                                            <span class="profile-ud-value">{{ $User->ad }}</span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Doğrum Tarihi</span>
                                            <span class="profile-ud-value">
                                                @if($User->dogum_tarihi)
                                                    {{ $User->dogum_tarihi }}
                                                    @else
                                                    Henüz eklenmemiş
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Soyad</span>
                                            <span class="profile-ud-value">{{ $User->soyad }}</span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Telefon Numarası</span>
                                            <span class="profile-ud-value">{{ $User->telefon }}</span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">E-Posta Adresi</span>
                                            <span class="profile-ud-value">{{ $User->eposta }}</span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Kayıt Tarihi</span>
                                            <span class="profile-ud-value">{{ getDateTime($User->created_at) }}</span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Adres</span>
                                            <span class="profile-ud-value">
                                                {{ $User->adres }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- .profile-ud-list -->
                            </div><!-- .nk-block -->
                            <div class="nk-block">
                                <div class="nk-block-head nk-block-head-line">
                                    <h6 class="title overline-title text-base">TERCİHLER</h6>
                                </div><!-- .nk-block-head -->
                                <div class="profile-ud-list">
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Dil</span>
                                            <span class="profile-ud-value">Türkçe (Türkiye)</span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Tarih Formatı</span>
                                            <span class="profile-ud-value">dd.mm.yyyy</span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label">Saat Dilimi</span>
                                            <span class="profile-ud-value">İstanbul (GMT +3)</span>
                                        </div>
                                    </div>
                                </div><!-- .profile-ud-list -->
                            </div><!-- .nk-block -->
                            <div class="nk-block">
                                <div class="nk-block-head nk-block-head-line">
                                    <h6 class="title overline-title text-base">BİLDİRİM TERCİHLERİ</h6>
                                </div><!-- .nk-block-head -->
                                <div class="profile-ud-list">
                                    @foreach(config('notifications') as $ntf)
                                        @foreach($ntf as $k => $nt)
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ $nt['title'] }}</span>
                                                    <span class="profile-ud-value">
                                                        @if(checkNotification($k,$User->id))
                                                            <span class="lead-text text-success">Etkin</span>
                                                        @else
                                                            <span class="lead-text text-danger">Devre Dışı</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div><!-- .profile-ud-list -->
                            </div><!-- .nk-block -->
                        </div><!-- .card-inner -->
                    </div><!-- .card-content -->
                    @include('admin.pages.users.view_aside')
                </div><!-- .card-aside-wrap -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">

        function Delete(id){

            Swal.fire({
                title: 'Emin misin ?',
                text: "Bu kullanıcı silinecektir. Bu işlemin geri dönüşü yoktur !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, silmek istiyorum!',
                cancelButtonText: 'Vazgeç'
            }).then(function (result) {
                if (result.value) {

                    var data = new FormData();

                    data.append("_token","{{ csrf_token() }}");
                    data.append("id",id);

                    $.ajax({
                        url: "{{ route("admin.users.list.delete") }}",
                        type: "post",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if(response){

                                Swal.fire({
                                    title: "Başarılı",
                                    text:"Kullanıcı başarıyla silindi !",
                                    icon:"success",
                                    confirmButtonText: "Tamam"
                                }).then(function(result){
                                    location.reload();
                                });

                                console.log("SYSTEM -> Kullanıcı sistemden silindi !");

                            }
                        },
                    });

                }
            });

        }

        $(document).ready(function () {


        });
    </script>
@endsection
