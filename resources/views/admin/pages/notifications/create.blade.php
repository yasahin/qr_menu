@extends('admin.layouts.default')
@section('title') Bildirim Gönder @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Bildirim Gönder</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <form action="{{ route('admin.notifications.create.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row gy-4">
                    <div class="col-sm-6">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">

                                    @include('admin.parts.success_custom')
                                    @include('admin.parts.errors_laravel')

                                    <div class="alert alert-pro alert-primary">
                                        <div class="alert-text">
                                            <h6>Önemli Bir Not !</h6>
                                            <p>
                                                Bildirim ayarlarından <i>" Sistem yöneticilerinden bildirim almak istiyorum "</i> &nbsp;seçeneğini aktif eden kullanıcılara bildirim gönderebilirsiniz.
                                                <b>Listede görünmeyen kullanıcıların bu seçeneği aktif değildir.</b>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- [users]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="users">Kullanıcıları Seç</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select form-control form-control-lg {{ CheckInput("users",$errors) }}" multiple name="users[]" id="users" data-search="on">
                                                @foreach(getAllUsers() as $user)
                                                    @if(checkNotification("admin_send_notifications",$user->id))
                                                        <option value="{{ $user->id }}">
                                                            {{ $user->getAdveSoyad() }} / {{ $user->auth->name }} / {{ $user->eposta }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- [icon]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="icon">Bildirim Icon'u</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select2 form-control form-control-lg {{ CheckInput("icon",$errors) }}" name="icon" id="icon" data-search="on">
                                                <option value="ni ni-alert">Uyarı Simgesi</option>
                                                <option value="ni ni-bell" selected>Alarm Simgesi</option>
                                                <option value="ni ni-check-circle">Onaylandı Simgesi</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- [renk]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="renk">Bildirim Rengi</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select form-control form-control-lg {{ CheckInput("renk",$errors) }}" name="renk" id="renk" data-search="on">
                                                <option value="bg-primary-dim" selected>Tema Rengi</option>
                                                <option value="bg-danger-dim">Kritik Uyarı Rengi</option>
                                                <option value="bg-warning-dim">Normal Uyarı Rengi</option>
                                                <option value="bg-success-dim">Başarılı Uyarı Rengi</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- [content] -->
                                    <div class="form-group">
                                        <label class="form-label" for="contents">Bildirim İçeriği</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control {{ CheckInput("contents",$errors) }}" name="contents" id="contents" rows="2">{{ old('contents') }}</textarea>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-wider btn-primary" style="width: 100%;">
                                        <span>Bildirimi Seçili Kullanıcılara Gönder</span>
                                        <em class="icon ni ni-check-circle-fill"></em>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- .nk-block -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            function formatState (state) {
                if (!state.id) { return state.text; }
                return '<em class="icon '+state.element.value.toLowerCase()+'"></em> '+state.text;
            }

            $(".form-select2").select2({
                templateResult: formatState,
                templateSelection: formatState,
                escapeMarkup: function(m) { return m; }
            });

        });
    </script>
@endsection
