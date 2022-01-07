@extends('admin.layouts.default')
@section('title') Kategori Düzenle @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Kategori Düzenle</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-preview">
                <div class="card-inner">
                    <div class="preview-block">
                        <form action="{{ route('qr_menu.categories.list.edit_store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $Category->id }}">
                            @include('admin.parts.success_custom')
                            @include('admin.parts.errors_laravel')
                            <div class="row gy-4">
                                <div class="col-sm-12">
                                    <!-- [name]* -->
                                    <div class="form-group">
                                        <label class="form-label" for="name">Kategori Adı</label>
                                        <div class="form-control-wrap">
                                            <input type="text" value="{{ $Category->name }}" class="form-control {{ CheckInput("name",$errors) }}" name="name" id="name" placeholder="Kategori adı giriniz">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-wider btn-primary" style="width: 100%;">
                                        <span>Kategori Güncelle </span>
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

        });
    </script>
@endsection
