@extends('admin.layouts.default')
@section('title') Hareketler @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Hareketler</h3>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        @include('admin.parts.errors_laravel')
        @include('admin.parts.success_custom')
        <div class="nk-block">
            <div class="row">

                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="nk-ecwg nk-ecwg6">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Toplam Hareket</h6>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="data-group">
                                        <div class="amount">{{ count($Logs) }}</div>
                                        <em class="icon ni ni-activity text-primary" style="font-size: 50px;"></em>
                                    </div>
                                </div>
                            </div><!-- .card-inner -->
                        </div><!-- .nk-ecwg -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <div class="card-inner">
                                    <div class="nk-block">
                                        <table class="datatable-init table">
                                            <thead>
                                            <tr>
                                                <th>Kullanıcı</th>
                                                <th>Tarayıcı</th>
                                                <th>IP Adresi</th>
                                                <th>İşlem</th>
                                                <th>Etiket</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Logs as $log)
                                                <tr>
                                                    <td>{{ $log->user->getAdveSoyad() }}</td>
                                                    <td>{{ $log->browser }}</td>
                                                    <td>{{ $log->ip }}</td>
                                                    <td>{{ $log->operation }}</td>
                                                    <td> <span class="badge badge-primary">{{ $log->tag }}</span> </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- .card-content -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <div class="card-inner">
                                    <div class="nk-block">

                                        <form action="{{ route("admin.logs.list.delete_with_users") }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <!-- [users]* -->
                                            <div class="form-group">
                                                <label class="form-label" for="users">Kullanıcıları Seçerek Hareketleri Temizle</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select form-control form-control-lg {{ CheckInput("users",$errors) }}" multiple name="users[]" id="users" data-search="on">
                                                        @foreach(getAllUsers() as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->getAdveSoyad() }} / {{ $user->auth->name }} / {{ $user->eposta }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-wider btn-primary" style="width: 100%;">
                                                <span>Seçili Kullanıcıların Hareketlerini Temizle</span>
                                                <em class="icon ni ni-check-circle-fill"></em>
                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <div class="card-inner">
                                    <div class="nk-block">

                                        <form action="{{ route("admin.logs.list.delete_with_tags") }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <!-- [users]* -->
                                            <div class="form-group">
                                                <label class="form-label" for="tags">Etiketleri Seçerek Hareketleri Temizle</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select form-control form-control-lg {{ CheckInput("tags",$errors) }}" multiple name="tags[]" id="tags" data-search="on">
                                                        @foreach($Tags as $tag)
                                                            <option value="{{ $tag->tag }}">
                                                                {{ $tag->tag }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-wider btn-primary" style="width: 100%;">
                                                <span>Seçili Etiketlerin Hareketlerini Temizle</span>
                                                <em class="icon ni ni-check-circle-fill"></em>
                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <div class="card-inner">
                                    <div class="nk-block">
                                        <label class="form-label" for="">Hızlı İşlemler</label>
                                        <a href="{{ route("admin.logs.list.delete_all") }}" class="btn btn-danger" style="width: 100%;"> <em class="icon ni ni-check-circle-fill"></em> Tüm Hareketleri Temizle </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .nk-block -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">

        $(document).ready(function () {


        });
    </script>
@endsection
