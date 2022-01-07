<!DOCTYPE html>
<html lang="tr" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Tayfa Creative Agency">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Yönetmeye kaldığın yerden devam et.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}">
    <!-- Page Title  -->
    <title>{{ config("app.name") }} | @yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/skins/theme-blue.css') }}">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar @if(getCurrentUser()->darkmode == 1) dark-mode @endif " current-user="{{ getCurrentUser()->id }}" dark-switch-url="{{ route('admin.dark_mode_switch') }}" csrf-token="{{ csrf_token() }}">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        @include('admin.includes.sidebar')
        <!-- wrap @s -->
        <div class="nk-wrap ">
            @include('admin.includes.header')
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            @include('admin.includes.footer')
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
@yield('modals')
<!-- JavaScript -->
<script src="{{ asset('admin/assets/js/moment-with-locales.js') }}"></script>
<script src="{{ asset('admin/assets/js/bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script type="text/javascript">

    function HeaderSetDateTime(){
        var header_date = moment().format("DD.MM.YYYY");
        var header_hourminute = moment().format("HH.mm");
        var header_second = moment().format("ss");

        $("#HeaderDate").text(header_date);
        $("#HeaderHourMinute").text(header_hourminute);
        $("#HeaderSecond").text(header_second);
    }

    function MySpinner(type) {
        if(type === 0){
            $("#GenelSpinner").hide();
        }else{
            $("#GenelSpinner").show();
        }
    }

    function readAllMyNotifications(){

        MySpinner(1);

        var data = new FormData();

        data.append("_token","{{ csrf_token() }}");

        $.ajax({
            url: "{{ route('admin.read_all_notifications') }}",
            type: "post",
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response){
                    MySpinner(0);
                    getMyNotifications();
                    console.log("SYSTEM -> Kullanıcının bildirimleri başarıyla okundu olarak işaretlendi !");
                }
            },
        });

    }

    function getMyNotifications(){

        MySpinner(1);

        var data = new FormData();

        data.append("_token","{{ csrf_token() }}");

        $.ajax({
            url: "{{ route('admin.get_notifications') }}",
            type: "post",
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response){
                    var jsonn = JSON.parse(response);

                    $("#MyNotifications").html('');
                    $("#MyNotificationStatus").removeClass("icon-status-na");
                    $("#MyNotificationStatus").removeClass("icon-status-info");
                    $(".MenuNotificationsCount").text("0");

                    if(jsonn.length > 0){

                        $("#MyNotificationStatus").addClass("icon-status-info");
                        $(".MenuNotificationsCount").text(jsonn.length);

                        $.each(jsonn,function(k,v){

                            if(k < 5){

                                var STR = '                                    <div class="nk-notification-item dropdown-inner">\n' +
                                    '                                        <div class="nk-notification-icon">\n' +
                                    '                                            <em class="icon icon-circle '+v.icon+' '+v.renk+'"></em>\n' +
                                    '                                        </div>\n' +
                                    '                                        <div class="nk-notification-content">\n' +
                                    '                                            <div class="nk-notification-text">'+v.content+'</div>\n' +
                                    '                                            <div class="nk-notification-time">'+v.diffCreatedDate+'</div>\n' +
                                    '                                        </div>\n' +
                                    '                                    </div>';

                                $("#MyNotifications").append(STR);

                            }

                        });

                    }else{
                        $("#MyNotificationStatus").addClass("icon-status-na");
                        $(".MenuNotificationsCount").text("0");
                        var STR = '                                    <center style="margin: 15px;">\n' +
                            '                                        <p>Hiç okunmamış bildirim yok !</p>\n' +
                            '                                    </center>';
                        $("#MyNotifications").append(STR);
                    }

                    MySpinner(0);

                    console.log("SYSTEM -> Kullanıcının bildirimleri getirildi !");
                }
            },
        });

    }

    $(document).ready(function(){

        $("form").submit(function(){
            MySpinner(1);
            var btn = $("button[type=submit]",this);
            btn.addClass("disabled");
            btn.attr("disabled",true);
        });

        HeaderSetDateTime();
        getMyNotifications();

        setInterval(function () {

            HeaderSetDateTime();

        },1000);

        setInterval(function(){
            getMyNotifications();
        },(60 * 1000));

    });
</script>
@yield('script')
</body>

</html>
