<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name") }} | QR Menü | Kategori : {{ $CategoryName }} </title>

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
        <div class="col-md-12 category2">
            <a href="{{ route("web.index") }}">
                <p class="name">
                    <img src="/web/assets/img/arrow-left.png" width="20" style="margin-top: -4px;" alt="">
                    GERİ DÖN
                </p>
            </a>
        </div>
        <div class="col-md-12 me-grid categoryhead">
            <p>{{ $CategoryName }}</p>
        </div>
    </div>
    <div class="row">

        @if(count($Products) > 0)
            @foreach($Products as $product)
                <!-- start ürün -->
                    <div class="col-md-12 urun-grid">
                        <div class="product">
                            <table class="me-table">
                                <tr>
                                    <td>
                                        <div class="urun-resim">
                                            @if($product->picture != null)
                                                <img src="{{ Storage::disk("uploads")->url($product->picture) }}" alt="">
                                                @else
                                                <img src="/web/assets/img/default_product_image.png" alt="">
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="urun-baslik">
                                            {{ $product->name }}
                                        </div>
                                        <div class="urun-aciklama">
                                            {{ $product->desc }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="urun-fiyat">
                                            @if($product->sale_price != null && $product->sale_price < $product->price)
                                                <small style="color: black;"><s>{{ $product->price }}₺</s></small> <br>
                                                {{ $product->sale_price }}₺
                                            @else
                                                {{ $product->price }}₺
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- end ürün -->
                @endforeach
            @else
            <small>Henüz bir ürün eklenmedi !</small>
        @endif

    </div>
</div>


<!-- js -->
<script src="/web/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/web/assets/bootstrap/js/jquery-3.6.0.min.js"></script>

</body>

</html>
