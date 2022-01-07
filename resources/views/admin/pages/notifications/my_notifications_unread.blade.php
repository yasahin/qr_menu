@extends('admin.layouts.default')
@section('title') Okunmamış Bildirimlerim @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Okunmamış Bildirimlerim </h3>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        @include('admin.parts.success_custom')
        <div class="nk-block">
            <div class="card">
                <div class="card-aside-wrap">
                    <div class="card-content">
                        @include('admin.pages.notifications.my_notifications_menu')
                        <div class="card-inner">
                            <div class="nk-block">
                                <div class="nk-block-head">
                                    <h5 class="title">Okunmamış Bildirimlerim</h5>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block-body">

                                    @if(count(getAllMyUnreadNotifications()) > 0)

                                        <a href="{{ route('admin.my_notifications.list.unread.read') }}" class="btn btn-primary">Tümünü Okundu Olarak İşaretle</a>

                                        @foreach(getAllMyUnreadNotifications() as $ntf)

                                            <div class="nk-notification-item">
                                                <div class="nk-notification-icon">
                                                    <em class="icon icon-circle {{ $ntf->icon }} {{ $ntf->renk }}"></em>
                                                </div>
                                                <div class="nk-notification-content">
                                                    <div class="nk-notification-text">{{ $ntf->content }}</div>
                                                    <div class="nk-notification-time">{{ getDiffForHumans($ntf->created_at) }}</div>
                                                </div>
                                            </div>

                                        @endforeach

                                        @else

                                        <p>Gösterilecek bir bildirim yok !</p>

                                    @endif

                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card-content -->



                </div><!-- .card-aside-wrap -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">

        $(document).ready(function () {


        });
    </script>
@endsection
