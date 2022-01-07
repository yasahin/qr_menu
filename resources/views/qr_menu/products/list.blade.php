@extends('admin.layouts.default')
@section('title') Ürünler @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Ürünler</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-preview">
                <div class="card-inner">
                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                        <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">Görsel</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Adı</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Kategori</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Açıklama</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Fiyat</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Satış Fiyatı</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Yayın Durumu</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-right"><span class="sub-text">İşlemler</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(getAllProducts() as $product)
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col">
                                    @if($product->picture != null)
                                        <img src="{{ Storage::disk("uploads")->url($product->picture) }}" width="64" alt="">
                                    @else
                                        <img src="/web/assets/img/default_product_image.png" width="64" alt="">
                                    @endif
                                </td>
                                <td class="nk-tb-col">{{ $product->name }}</td>
                                <td class="nk-tb-col">{{ $product->category->name }}</td>
                                <td class="nk-tb-col">
                                    @if($product->desc != null)
                                        {{ $product->desc }}
                                        @else
                                        Belirtilmemiş !
                                    @endif
                                </td>
                                @if($product->sale_price != null && $product->sale_price < $product->price)
                                    <td class="nk-tb-col"><s>{{ $product->price }} ₺</s></td>
                                    <td class="nk-tb-col">{{ $product->sale_price }} ₺ </td>
                                    @else
                                    <td class="nk-tb-col"><s>{{ $product->price }} ₺</s></td>
                                    <td class="nk-tb-col"> <span class="badge badge-primary">İndirim Yok !</span> </td>
                                @endif
                                <td class="nk-tb-col">
                                    @if($product->durum == 0)
                                        <span class="badge badge-danger">Yayında Değil</span>
                                        @else
                                        <span class="badge badge-success">Yayında</span>
                                    @endif
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        @if($product->durum == 0)
                                            <li class="nk-tb-action">
                                                <a href="{{ route("qr_menu.products.list.change_durum",[$product->id,0]) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Yayına Al">
                                                    <em class="icon ni ni-eye"></em>
                                                </a>
                                            </li>
                                            @else
                                            <li class="nk-tb-action">
                                                <a href="{{ route("qr_menu.products.list.change_durum",[$product->id,1]) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Yayından Çıkar">
                                                    <em class="icon ni ni-eye-off"></em>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="nk-tb-action">
                                            <a href="{{ route("qr_menu.products.list.edit",$product->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                                <em class="icon ni ni-edit"></em>
                                            </a>
                                        </li>
                                        <li class="nk-tb-action">
                                            <a href="javascript:;" class="btn btn-trigger btn-icon" onclick="Delete({{ $product->id }})" data-toggle="tooltip" data-placement="top" title="Sil">
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
                text: "Bu ürün silinecektir. Bu işlemin geri dönüşü yoktur !",
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
                        url: "{{ route("qr_menu.products.list.delete") }}",
                        type: "post",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if(response){

                                Swal.fire({
                                    title: "Başarılı",
                                    text:"Ürün başarıyla silindi !",
                                    icon:"success",
                                    confirmButtonText: "Tamam"
                                }).then(function(result){
                                    location.reload();
                                });

                                console.log("SYSTEM -> Ürün sistemden silindi !");

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
