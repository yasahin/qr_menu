@extends('admin.layouts.default')
@section('title') Hesap Hareketleri @endsection
@section('content')
    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Hesap Hareketleri </h4>
                                <div class="nk-block-des">
                                    <p>En son 20 işleminiz aşağıda listelenmektedir.<em class="icon ni ni-info"></em></p>
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
                        <table class="table table-ulogs">
                            <thead class="thead-light">
                                <tr>
                                    <th class="tb-col-os"><span class="overline-title">TARAYICI <span class="d-sm-none">/ IP</span></span></th>
                                    <th class="tb-col-ip"><span class="overline-title">IP</span></th>
                                    <th class="tb-col-os"><span class="overline-title">İŞLEM</span></th>
                                    <th class="tb-col-time"><span class="overline-title">TARİH</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(getHareketler("all",20,"DESC") as $log)
                                    <tr>
                                        <td class="tb-col-os">{{ $log->browser }}</td>
                                        <td class="tb-col-ip"><span class="sub-text">{{ $log->ip }}</span></td>
                                        <td class="tb-col-os">{{ $log->operation }}</td>
                                        <td class="tb-col-time"><span class="sub-text">{{ getDiffForHumans($log->created_at) }}</span> {{ getDateTime($log->created_at) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- .nk-block -->
                </div>
                @include('admin.pages.my_profile.profile_aside',['sayfa' => 'hesap_hareketleri'])
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection
