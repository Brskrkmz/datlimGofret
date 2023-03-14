<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datlım Gofret</title>
        <!-- choose one -->
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('build/assets/app-37892e52.css') }}">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <strong>burası ana menü</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <strong>Kategoriler</strong>
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <ul>
                            <li><a href="/kategori/{{ $category->slug }}">{{ $category->name }}</a></li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="col-sm-3">
                <strong>Ürünler</strong>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <ul>
                            <li>{{ $product->name }}</li>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</body>
</html>