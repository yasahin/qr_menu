@extends('admin.layouts.default')
@section('title') Kullanıcı Oluştur @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Kullanıcı Oluştur</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-preview">
                <div class="card-inner">
                    <div class="preview-block">
                        <form action="{{ route('admin.users.create.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('admin.parts.success_custom')
                            @include('admin.parts.errors_laravel')
                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <!-- [profil_resmi] -->
                                    <div class="form-group">
                                        <label class="form-label" for="profil_resmi">Profil Resmi</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{ CheckInput("profil_resmi",$errors) }}" name="profil_resmi" id="profil_resmi">
                                                <label class="custom-file-label" for="profil_resmi">Dosya Seç</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- [ad]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="ad">Ad</label>
                                        <div class="form-control-wrap">
                                            <input type="text" value="{{ old('ad') }}" class="form-control {{ CheckInput("ad",$errors) }}" name="ad" id="ad" placeholder="Ad giriniz">
                                        </div>
                                    </div>
                                    <!-- [soyad]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="soyad">Soyad</label>
                                        <div class="form-control-wrap">
                                            <input type="text" value="{{ old('soyad') }}" class="form-control {{ CheckInput("soyad",$errors) }}" name="soyad" id="soyad" placeholder="Soyad giriniz">
                                        </div>
                                    </div>
                                    <!-- [telefon]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="telefon">Telefon Numarası</label>
                                        <div class="form-control-wrap">
                                            <input type="text" value="{{ old('telefon') }}" class="form-control {{ CheckInput("telefon",$errors) }}" name="telefon" id="telefon" placeholder="+90xxxxxxxxxx">
                                        </div>
                                    </div>
                                    <!-- [dogum_tarihi] -->
                                    <div class="form-group">
                                        <label class="form-label" for="dogum_tarihi">Doğrum Tarihi</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" value="{{ old('dogum_tarihi') }}" class="form-control date-picker {{ CheckInput("dogum_tarihi",$errors) }}" id="dogum_tarihi" name="dogum_tarihi" data-date-format="dd.mm.yyyy">
                                        </div>
                                    </div>
                                    <!-- [adres] -->
                                    <div class="form-group">
                                        <label class="form-label" for="adres">Adres</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control {{ CheckInput("adres",$errors) }}" name="adres" id="adres" rows="2">{{ old('adres') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- [auth]* -->
                                    <div class="form-group">
                                        <label class="form-label">Yetki</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select form-control form-control-lg {{ CheckInput("auth",$errors) }}" name="auth" id="auth" data-search="on">
                                                @foreach(getAllAuths() as $auth)
                                                    <option value="{{ $auth->id }}">{{ $auth->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- [eposta]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="eposta">E-Posta</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-emails-fill"></em>
                                            </div>
                                            <input type="text" value="{{ old('eposta') }}" class="form-control {{ CheckInput("eposta",$errors) }}" name="eposta" id="eposta" placeholder="E-Posta giriniz">
                                        </div>
                                    </div>
                                    <!-- [sifre]* -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="sifre">Şifre</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="sifre">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="sifre" class="form-control {{ CheckInput("sifre",$errors) }}" id="sifre" placeholder="Şifrenizi giriniz">
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
                                            <input type="password" name="sifre_confirmation" class="form-control {{ CheckInput("sifre_confirmation",$errors) }}" id="sifre_confirmation" placeholder="Şifrenizi tekrar giriniz">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-wider btn-primary" style="width: 100%;">
                                        <span>Kullanıcıyı Oluştur </span>
                                        <em class="icon ni ni-check-circle-fill"></em>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .nk-block -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/assets/js/libs/jquery.inputmask.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $("#telefon").inputmask({
                mask: '9 (999) 999 99 99',
                removeMaskOnSubmit: true
            });

        });
    </script>
@endsection
