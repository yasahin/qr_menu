<!DOCTYPE html>
<html lang="tr" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Tayfa Creative Agency">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Yönetmeye kaldığın yerden devam et.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}">
    <!-- Page Title  -->
    <title>{{ config("app.name") }} | Şifremi Unuttum ?</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/skins/theme-blue.css') }}">
    <script src="//www.google.com/recaptcha/api.js?render={{ config("app.recaptcha_site_key") }}"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{ config('app.recaptcha_site_key') }}', { action: 'login' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</head>

<body class="nk-body bg-white npc-default pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="html/index.html" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="{{ asset('admin/images/logo.png') }}" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="{{ asset('admin/images/logo-dark.png') }}" alt="logo-dark">
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Şifremi Unuttum ?</h4>
                                    <div class="nk-block-des">
                                        <p>
                                            Şifreni sıfırlamak için e-posta adresine ihtiyacımız var.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning alert-icon" style="margin: 5px 0 5px 0;">
                                        <em class="icon ni ni-alert-circle"></em>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <form action="{{ route("admin.login.forgot_password.send") }}" method="POST">
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">E-Posta</label>
                                    </div>
                                    <input type="text" value="{{ old('eposta') }}" name="eposta" class="form-control form-control-lg {{ CheckInput("eposta",$errors) }} " id="default-01" placeholder="E-Posta adresinizi giriniz">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Sıfırlama Bağlantısı Gönder</button>
                                </div>
                                <div class="form-group" id="GenelSpinner" style="display: none;">
                                    <div class="d-flex align-items-center">
                                        <strong>Bekleyiniz...</strong>
                                        <div class="spinner-border text-primary ml-auto" role="status" aria-hidden="true"></div>
                                    </div>
                                </div>
                            </form>
                            {{-- <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="html/pages/auths/auth-register-v2.html">Create an account</a>
                            </div>--}}
                            {{-- <div class="text-center pt-4 pb-3">
                                <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                            </div>
                            <ul class="nav justify-center gx-4">
                                <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="nk-footer nk-auth-footer-full">
                    <div class="container wide-lg">
                        <div class="row g-3">
                            <div class="col-lg-6 order-lg-last">
                                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ config("app.help_url") }}" target="_blank">Yardıma ihtiyacım var ?</a>
                                    </li>
                                    <li class="nav-item dropup">
                                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" data-offset="0,10">
                                            <img src="{{ asset('admin/images/flags/turkey.png') }}" width="32" alt=""> &nbsp; <span>Türkçe</span></a>
                                        {{-- <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/english.png" alt="" class="language-flag">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                                        <span class="language-name">Español</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/french.png" alt="" class="language-flag">
                                                        <span class="language-name">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                                        <span class="language-name">Türkçe</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>--}}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="nk-block-content text-center text-lg-left">
                                    <p class="text-soft">by <a href="{{ config("app.author_url") }}" target="_blank">{{ config("app.author_name") }}</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('admin/assets/js/bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>

<script type="text/javascript">

    function MySpinner(type) {
        if(type === 0){
            $("#GenelSpinner").hide();
        }else{
            $("#GenelSpinner").show();
        }
    }

    $(document).ready(function(){

        $("form").submit(function(){
            MySpinner(1);
            var btn = $("button[type=submit]",this);
            btn.addClass("disabled");
            btn.attr("disabled",true);
        });

    });
</script>

</body>

</html>
