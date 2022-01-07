@extends('admin.layouts.default')
@section('title') Bildirimler @endsection
@section('content')
    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Bildirimler</h4>
                                <div class="nk-block-des">
                                    <p>Bildirim ayarlarınızı bu ekrandan düzenleyebilirsiniz.</p>
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

                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-head-content">
                                <h6>Güvenlik</h6>
                                <p>Hangi durumlarda bildirim almak istersiniz ?</p>
                            </div>
                        </div><!-- .nk-block-head -->

                        <div class="nk-block-content">
                            <div class="gy-3">
                                @foreach(config("notifications.guvenlik") as $key => $value)
                                    <div class="g-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input ntf_checkbox" @if(checkNotification($key)) checked @endif id="{{ $key }}">
                                            <label class="custom-control-label" for="{{ $key }}">
                                                {{ $value['title'] }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- .nk-block-content -->
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-head-content">
                                <h6>Sistem</h6>
                                <p>Hangi durumlarda bildirim almak istersiniz ?</p>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block-content">
                            <div class="gy-3">
                                @foreach(config("notifications.sistem") as $key => $value)
                                    <div class="g-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input ntf_checkbox" @if(checkNotification($key)) checked @endif id="{{ $key }}">
                                            <label class="custom-control-label" for="{{ $key }}">
                                                {{ $value['title'] }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- .nk-block-content -->
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-head-content">
                                <h6>Yenilikler & Güncellemeler</h6>
                                <p>Hangi durumlarda bildirim almak istersiniz ?</p>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block-content">
                            <div class="gy-3">
                                @foreach(config("notifications.yenilik") as $key => $value)
                                    <div class="g-item">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input ntf_checkbox" @if(checkNotification($key)) checked @endif id="{{ $key }}">
                                            <label class="custom-control-label" for="{{ $key }}">
                                                {{ $value['title'] }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- .nk-block-content -->

                    </div><!-- .nk-block -->
                </div>
                @include('admin.pages.my_profile.profile_aside',['sayfa' => 'bildirimler'])
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection
@section('script')
    <script type="text/javascript">

        $(document).ready(function(){

            var chckbox = $(".ntf_checkbox");

            chckbox.on('change',function(){

                $(".ntf_checkbox").attr('disabled', true);

                var name = $(this).attr("id");

                var data = new FormData();

                data.append("_token","{{ csrf_token() }}");
                data.append("name",name);

                $.ajax({
                    url: "{{ route('admin.my_account.notifications.save') }}",
                    type: "post",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $(".ntf_checkbox").attr('disabled', false);
                        toastr.clear();
                        NioApp.Toast('<h5>Güncelleme Başarılı</h5><p>Bildirim ayarınız başarıyla kayıt edildi.</p>', 'success');
                        if(response){
                            console.log("SYSTEM -> Kullanıcının Bildirim Ayarı Kayıt Edildi !");
                        }
                    },
                });

            });

        });

    </script>
@endsection
