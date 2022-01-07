@extends('admin.layouts.default')
@section('title') Güvenlik Ayarları @endsection
@section('content')
    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Güvenlik Ayarları</h4>
                                <div class="nk-block-des">
                                    <p>Hesabınızı güvende tutmak için gerekli tüm ayarlar burada.</p>
                                </div>
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        @include('admin.parts.success_custom')
                        @include('admin.parts.errors_laravel')
                        @include('admin.parts.errors_custom')

                        <div class="card">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                        <div class="nk-block-text">
                                            <h6>Hareketlerimi Kaydet</h6>
                                            <p>
                                                Sistemdeki bütün yaptığınız işlemleri kayıt eder.
                                            </p>
                                        </div>
                                        <div class="nk-block-actions">
                                            <ul class="align-center gx-3">
                                                <li class="order-md-last">
                                                    <div class="custom-control custom-switch mr-n2">
                                                        <input type="checkbox" class="custom-control-input" @if(getCurrentUser()->log_kayit == 1) checked @endif id="log_kayit">
                                                        <label class="custom-control-label" for="log_kayit"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="between-center flex-wrap g-3">
                                        <div class="nk-block-text">
                                            <h6>Şifre Değiştir</h6>
                                            <p>Hesabını güvende tutmak için zor ve benzersiz bir şifre seçmelisin.</p>
                                        </div>
                                        <div class="nk-block-actions flex-shrink-sm-0">
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                <li class="order-md-last">
                                                    <a href="javascript:;" data-toggle="modal" data-target="#change_password" class="btn btn-primary">Değiştir</a>
                                                </li>
                                                <li>
                                                    <em class="text-soft text-date fs-12px">Son Değiştirme: <span> {{ getLastPasswordChange() }}</span></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                        <div class="nk-block-text">
                                            <h6>İki Faktörlü Kimlik Doğrulama &nbsp;
                                                @if(getCurrentUser()->iki_adimli == 0)
                                                    <span class="badge badge-danger ml-0">Devre Dışı</span>
                                                @else
                                                    <span class="badge badge-success ml-0">Etkin</span>
                                                @endif
                                            </h6>
                                            <p>
                                                Bu doğrulama sistemi sayesinde, hesabınıza giriş yaptığınızda size 6 haneli bir kod içeren e-posta göndereceğiz.
                                                E-Posta adresinizde ki kodu doğru girdikten sonra hesabınıza erişebileceksiniz.
                                            </p>
                                        </div>
                                        <div class="nk-block-actions">
                                            <form action="{{ route('admin.my_account.security.two_factor') }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary @if(getCurrentUser()->hesap_onay == 0) disabled @endif" @if(getCurrentUser()->hesap_onay == 0) disabled @endif>
                                                    @if(getCurrentUser()->iki_adimli == 0)
                                                        Aç
                                                        @else
                                                        Kapat
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->

                    </div><!-- .nk-block -->
                </div>
                @include('admin.pages.my_profile.profile_aside',['sayfa' => 'guvenlik_ayarlari'])
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection
@section('modals')
    <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" tabindex="-1" role="dialog" id="change_password">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <form action="{{ route("admin.my_account.security.change_password") }}" method="POST">
                        <div class="row gy-4">
                            {{ csrf_field() }}

                            <div class="col-md-12">

                                <!-- [eski_sifre]* -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="eski_sifre">Eski Şifre</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="eski_sifre">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="eski_sifre" class="form-control {{ CheckInput("eski_sifre",$errors) }}" id="eski_sifre" placeholder="Eski şifrenizi giriniz">
                                    </div>
                                </div>

                                <!-- [sifre]* -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="sifre">Yeni Şifre</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="sifre">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="sifre" class="form-control {{ CheckInput("sifre",$errors) }}" id="sifre" placeholder="Yeni şifrenizi giriniz">
                                    </div>
                                </div>

                                <!-- [sifre_confirmation]* -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="sifre_confirmation">Şifre Tekrar</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="sifre_confirmation">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="sifre_confirmation" class="form-control {{ CheckInput("sifre_confirmation",$errors) }}" id="sifre_confirmation" placeholder="Yeni şifrenizi tekrar giriniz">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-lg btn-primary">Kaydet</button>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Vazgeç</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
@endsection
@section('script')
    <script type="text/javascript">

        $(document).ready(function(){

            var chckbox = $("#log_kayit");

            chckbox.on('change',function(){

                $("#log_kayit").attr('disabled', true);

                var name = $(this).attr("id");

                var data = new FormData();

                data.append("_token","{{ csrf_token() }}");
                data.append("name",name);

                $.ajax({
                    url: "{{ route('admin.my_account.security.log_kayit') }}",
                    type: "post",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $("#log_kayit").attr('disabled', false);
                        toastr.clear();
                        NioApp.Toast('<h5>Güncelleme Başarılı</h5><p>Ayarınız başarıyla kayıt edildi.</p>', 'success');
                        if(response){
                            console.log("SYSTEM -> Kullanıcının Güvenlik Ayarı Kayıt Edildi !");
                        }
                    },
                });

            });

        });

    </script>
@endsection
