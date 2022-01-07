<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name") }} | QR Menü</title>

    <!-- css -->
    <link rel="stylesheet" href="/web/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/web/assets/css/style.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
          rel="stylesheet">

</head>

<body>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 footer">
            <img src="/web/assets/img/logo.jpg" width="70" alt="">
            <p>{{ config("app.name") }} | QR Menü</p>
        </div>

        <div class="col-md-12 category discount">
            <a href="{{ route("web.discounts") }}">
                <p class="name">İNDİRİMDEKİLER</p>
                <p class="badge bg-light text-dark count">{{ IndirimdekilerSay() }}</p>
            </a>
        </div>

        @foreach(getAllCategories() as $category)
            <div class="col-md-12 category">
                <a href="{{ route("web.category",$category->id) }}">
                    <p class="name">{{ $category->name }}</p>
                    <p class="badge bg-light text-dark count">{{ $category->products->count() }}</p>
                </a>
            </div>
        @endforeach

    </div>
</div>


<!-- js -->
<script src="/web/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/web/assets/bootstrap/js/jquery-3.6.0.min.js"></script>

</body>

</html>
