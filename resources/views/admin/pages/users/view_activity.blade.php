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
                                <a href="{{ route("admin.users.list.view.activity_clear",$User->id) }}" class="btn btn-danger mb-4"><em class="icon ni ni-trash"></em> Hareketleri temizle ! </a>
                                <table class="datatable-init table">
                                    <thead>
                                    <tr>
                                        <th>Tarayıcı</th>
                                        <th>IP Adresi</th>
                                        <th>İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(getHareketler("all",0,"DESC",$User->id) as $log)
                                            <tr>
                                                <td>{{ $log->browser }}</td>
                                                <td>{{ $log->ip }}</td>
                                                <td>{{ $log->operation }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
