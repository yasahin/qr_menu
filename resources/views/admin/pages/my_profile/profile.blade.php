@extends('admin.layouts.default')
@section('title') Profilim @endsection
@section('content')
    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Kişisel Bilgiler</h4>
                                <div class="nk-block-des">
                                    <p>{{ config("app.name") }} içerisinde kullanılacak ad,soyad ve e-posta adresi gibi temel bilgileriniz.</p>
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
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">Temel</h6>
                            </div>
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Ad</span>
                                    <span class="data-value">{{ getCurrentUser()->ad }}</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Soyad</span>
                                    <span class="data-value">{{ getCurrentUser()->soyad }}</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">E-Posta</span>
                                    <span class="data-value">{{ getCurrentUser()->eposta }}</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Telefon Numarası</span>
                                    <span class="data-value">{{ getCurrentUser()->telefon }}</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Doğrum Tarihi</span>
                                    @if(getCurrentUser()->dogum_tarihi != null)
                                        <span class="data-value">{{ getCurrentUser()->dogum_tarihi }}</span>
                                        @else
                                        <span class="data-value text-soft">Henüz eklenmemiş</span>
                                    @endif
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                <div class="data-col">
                                    <span class="data-label">Adres</span>
                                    @if(getCurrentUser()->adres != null)
                                        <span class="data-value">{{ getCurrentUser()->adres }}</span>
                                    @else
                                        <span class="data-value text-soft">Henüz eklenmemiş</span>
                                    @endif
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div><!-- data-item -->
                        </div><!-- data-list -->
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">Tercihler</h6>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Dil</span>
                                    <span class="data-value">Türkçe (Türkiye)</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Tarih Formatı</span>
                                    <span class="data-value">dd.mm.yyyy</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Saat Dilimi</span>
                                    <span class="data-value">İstanbul (GMT +3)</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                            </div><!-- data-item -->
                        </div><!-- data-list -->
                    </div><!-- .nk-block -->
                </div>
                @include('admin.pages.my_profile.profile_aside',['sayfa' => 'profilim'])
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection
@section('modals')
    <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Profili Güncelle</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal">Kişisel Bilgiler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#address">Adres</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form action="{{ route("admin.my_account.profile.kisisel_bilgiler.save") }}" method="POST">
                                <div class="row gy-4">
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Ad</label>
                                            <input type="text" class="form-control form-control-lg {{ CheckInput("ad",$errors) }}" name="ad" id="ad" value="{{ getCurrentUser()->ad }}" placeholder="Adınızı giriniz">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Soyad</label>
                                            <input type="text" class="form-control form-control-lg {{ CheckInput("soyad",$errors) }}" name="soyad" id="soyad" value="{{ getCurrentUser()->soyad }}" placeholder="Soyadınızı giriniz">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Telefon Numarası</label>
                                            <input type="text" class="form-control form-control-lg {{ CheckInput("telefon",$errors) }}" name="telefon" id="telefon" value="{{ getCurrentUser()->telefon }}" placeholder="Telefon numaranız">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="birth-day">Doğum Tarihi</label>
                                            <input type="text" class="form-control form-control-lg date-picker {{ CheckInput("dogum_tarihi",$errors) }}" data-date-format="dd.mm.yyyy" name="dogum_tarihi" id="dogum_tarihi" value="{{ getCurrentUser()->dogum_tarihi }}" placeholder="Doğrum tarihiniz">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-lg btn-primary">Bilgileri Güncelle</button>
                                            </li>
                                            <li>
                                                <a href="#" data-dismiss="modal" class="link link-light">Vazgeç</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .tab-pane -->
                        <div class="tab-pane" id="address">
                            <form action="{{ route("admin.my_account.profile.adres.save") }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="address-l1">Adres</label>
                                            <textarea class="form-control" name="adres" id="adres" rows="2">{{ getCurrentUser()->adres }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-lg btn-primary">Adresi Güncelle</button>
                                            </li>
                                            <li>
                                                <a href="#" data-dismiss="modal" class="link link-light">Vazgeç</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
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
