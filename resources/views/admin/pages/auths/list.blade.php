@extends('admin.layouts.default')
@section('title') Yetkiler @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Yetkiler</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-preview">
                <div class="card-inner">
                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                        <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">Yetki Adı</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Yetki Sayısı</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Kullanıcı Sayısı</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-right"><span class="sub-text">İşlemler</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(getAllAuths() as $auth)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">{{ $auth->name }}</td>
                                    <td class="nk-tb-col"> <span class="badge badge-danger">{{ $auth->authsCount() }}</span> </td>
                                    <td class="nk-tb-col"> <span class="badge badge-success">{{ $auth->users()->count() }}</span> </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action">
                                                <a href="{{ route("admin.auths.list.edit",$auth->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                                    <em class="icon ni ni-edit"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action">
                                                <a href="javascript:;" class="btn btn-trigger btn-icon" onclick="Delete({{ $auth->id }})" data-toggle="tooltip" data-placement="top" title="Sil">
                                                    <em class="icon ni ni-trash"></em>
                                                </a>
                                            </li>
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
                text: "Bu yetki silinecektir. Bu işlemin geri dönüşü yoktur !",
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
                        url: "{{ route("admin.auths.list.delete") }}",
                        type: "post",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if(response){

                                Swal.fire({
                                    title: "Başarılı",
                                    text:"Yetki başarıyla silindi !",
                                    icon:"success",
                                    confirmButtonText: "Tamam"
                                }).then(function(result){
                                    location.reload();
                                });

                                console.log("SYSTEM -> Yetki sistemden silindi !");

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
