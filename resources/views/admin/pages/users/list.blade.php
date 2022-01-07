@extends('admin.layouts.default')
@section('title') Kullanıcılar @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Kullanıcılar</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-preview">
                <div class="card-inner">
                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                        <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">Kullanıcı</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Yetki</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Hesap Durumu</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Telefon</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Ayarlar</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-right">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(getAllUsers() as $user)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                {!! $user->getProfilResmi() !!}
                                            </div>
                                            <div class="user-info">
                                                @if($user->id == getCurrentUser()->id)
                                                    <small><em class="icon ni ni-star-fill text-warning"></em> Bu sizsiniz</small>
                                                @endif
                                                <span class="tb-lead">{{ $user->getAdveSoyad() }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                <span>{{ $user->eposta }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        {{ $user->auth->name }}
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        @if($user->hesap_onay == 1)
                                            <span class="tb-status text-success">Doğrulandı</span>
                                            @else
                                            <span class="tb-status text-danger">Doğrulanmamış</span>
                                        @endif
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{ $user->telefon }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                        <ul class="list-status">
                                            <li>
                                                @if($user->iki_adimli == 1)
                                                    <em class="icon text-success ni ni-check-circle"></em>
                                                    @else
                                                    <em class="icon text-warning ni ni-alert-circle"></em>
                                                @endif
                                                <span>İki Adımlı Kimlik Doğrulama</span>
                                            </li>
                                            <li>
                                                @if($user->log_kayit == 1)
                                                    <em class="icon text-success ni ni-check-circle"></em>
                                                @else
                                                    <em class="icon text-warning ni ni-alert-circle"></em>
                                                @endif
                                                <span>Hareket Kayıt</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action">
                                                <a href="{{ route("admin.users.list.view",$user->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Görüntüle">
                                                    <em class="icon ni ni-eye"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action">
                                                <a href="{{ route("admin.users.list.edit",$user->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                                    <em class="icon ni ni-edit"></em>
                                                </a>
                                            </li>
                                            @if($user->id != getCurrentUser()->id)
                                                <li class="nk-tb-action">
                                                    <a href="javascript:;" class="btn btn-trigger btn-icon" onclick="Delete({{ $user->id }})" data-toggle="tooltip" data-placement="top" title="Sil">
                                                        <em class="icon ni ni-trash"></em>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </td>
                                </tr><!-- .nk-tb-item  -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
