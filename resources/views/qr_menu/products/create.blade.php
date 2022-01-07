@extends('admin.layouts.default')
@section('title') Ürün Oluştur @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Ürün Oluştur</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-preview">
                <div class="card-inner">
                    <div class="preview-block">
                        <form action="{{ route('qr_menu.products.create.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('admin.parts.success_custom')
                            @include('admin.parts.errors_laravel')
                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <!-- [picture] -->
                                    <div class="form-group">
                                        <label class="form-label" for="picture">Ürün Resmi</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{ CheckInput("picture",$errors) }}" name="picture" id="picture">
                                                <label class="custom-file-label" for="picture">Dosya Seç</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- [category_id]* -->
                                    <div class="form-group">
                                        <label class="form-label">Ürün Kategorisi</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select form-control form-control-lg {{ CheckInput("category_id",$errors) }}" name="category_id" id="category_id" data-search="on">
                                                @foreach(getAllCategories() as $auth)
                                                    <option value="{{ $auth->id }}">{{ $auth->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- [name]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="name">Ürün Adı</label>
                                        <div class="form-control-wrap">
                                            <input type="text" value="{{ old('name') }}" class="form-control {{ CheckInput("name",$errors) }}" name="name" id="name" placeholder="Ürün adı giriniz">
                                        </div>
                                    </div>
                                    <!-- [price]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="price">Ürün Fiyatı</label>
                                        <div class="form-control-wrap">
                                            <input type="number" step="any" value="{{ old('price') }}" class="form-control {{ CheckInput("price",$errors) }}" name="price" id="price" placeholder="Ürün fiyatı giriniz">
                                        </div>
                                    </div>
                                    <!-- [sale_price]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="sale_price">Ürün Satış Fiyatı</label>
                                        <div class="form-control-wrap">
                                            <input type="number" step="any" value="{{ old('sale_price') }}" class="form-control {{ CheckInput("sale_price",$errors) }}" name="sale_price" id="sale_price" placeholder="Satış fiyatını giriniz">
                                        </div>
                                    </div>
                                    <!-- [desc] -->
                                    <div class="form-group">
                                        <label class="form-label" for="desc">Açıklama</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control {{ CheckInput("desc",$errors) }}" name="desc" id="desc" rows="2">{{ old('desc') }}</textarea>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-wider btn-primary" style="width: 100%;">
                                        <span>Ürünü Oluştur </span>
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
