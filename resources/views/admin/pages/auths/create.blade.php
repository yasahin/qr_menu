@extends('admin.layouts.default')
@section('title') Yetki Oluştur @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Yetki Oluştur</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-preview">
                <div class="card-inner">
                    <div class="preview-block">
                        <form action="{{ route('admin.auths.create.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('admin.parts.success_custom')
                            @include('admin.parts.errors_laravel')
                            <div class="nk-block">
                                <div class="row gy-4">
                                    <div class="col-md-4">

                                        <!-- [name]* -->
                                        <div class="form-group">
                                            <label class="form-label" for="name">Yetki Adı</label>
                                            <div class="form-control-wrap">
                                                <input type="text" value="{{ old('name') }}" class="form-control {{ CheckInput("name",$errors) }}" name="name" id="name" placeholder="Yetki adı giriniz">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-wider btn-primary" style="width: 100%;">
                                            <span>Yetki'yi Oluştur </span>
                                            <em class="icon ni ni-check-circle-fill"></em>
                                        </button>
                                    </div>
                                </div>
                                <div class="row gy-4 pt-3">
                                    <div class="col-md-12">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="nk-block-head-content">
                                                <h6>Kullanıcı Yetkileri</h6>
                                                <p>Bu kullanıcı hangi menüleri,bölümleri veya işlemleri yönetebilsin ?</p>
                                            </div>
                                        </div><!-- .nk-block-head -->
                                    </div>

                                    @foreach(config("menu") as $menuGroupKey => $menuGroup)
                                        @foreach($menuGroup as $mainMenuKey => $mainMenu)
                                            <div class="col-md-4">
                                                <div class="card bg-light">
                                                    <div class="card-inner">
                                                        <h5 class="card-title">{{ $menuGroupKey }}</h5>
                                                        <h6 class="card-subtitle mb-2">{{ $mainMenu['title'] }}</h6>
                                                        <div class="card-content">
                                                            @if(@$mainMenu['sub'])
                                                                @foreach($mainMenu['sub'] as $subMenuKey => $subMenu)
                                                                    <div class="g-item mb-1">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" name="auths[]" class="custom-control-input" value="menu_{{ $subMenu['id'] }}" id="subMenu{{ $subMenu['id'] }}">
                                                                            <label class="custom-control-label" for="subMenu{{ $subMenu['id'] }}">
                                                                                {{ $subMenu['title'] }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                @else
                                                                <div class="g-item mb-1">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" name="auths[]" class="custom-control-input" value="menu_{{ $mainMenu['id'] }}" id="mainMenu{{ $mainMenu['id'] }}">
                                                                        <label class="custom-control-label" for="mainMenu{{ $mainMenu['id'] }}">
                                                                            Etkinleştir
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @foreach(config("auths") as $authsKey => $auths)
                                        <div class="col-md-4">
                                            <div class="card bg-light">
                                                <div class="card-inner">
                                                    <h5 class="card-title">{{ $authsKey }}</h5>
                                                    <div class="card-content">
                                                        @foreach($auths as $authKey => $auth)
                                                            <div class="g-item mb-1">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" name="auths[]" class="custom-control-input" value="auth_{{ $authKey }}" id="auth_{{ $authKey }}">
                                                                    <label class="custom-control-label" for="auth_{{ $authKey }}">
                                                                        {{ $auth['title'] }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .nk-block -->
    </div>
@endsection
