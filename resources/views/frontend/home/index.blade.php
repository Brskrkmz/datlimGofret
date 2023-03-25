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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
               
                  <nav class="navbar navbar-default navbar-fixed-left">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <a class="navbar-brand" href="/">Gofret Gofret</a>
                      </div>
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Anasayfa</a></li>
                      </ul>
                      @auth
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="/hesabim"><span class="glyphicon glyphicon-log-in">Hesabım</span></a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="/cikis"><span class="glyphicon glyphicon-log-in">Çıkış</span></a></li>
                      </ul>
                        @else
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="giris"><span class="glyphicon glyphicon-log-in">Giriş Yap</span></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="/uye-ol"><span class="glyphicon glyphicon-log-in">Uye Ol</span></a></li>
                        </ul>
                      @endauth
                      
                    </div>
                  </nav>
        
        <div class="row">
            <div class="col-sm-3 pt-4">
                <h5>Kategoriler</h5>
                <div class="list-group">
                    @if (count($categories) > 0)
                    <a href="/" class="list-group-item list-group-item-action" style="background-color: rgb(255, 249, 255)">Tüm Ürünler</a>
                    @foreach ($categories as $category)
                        <a href="/kategori/{{ $category->slug }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                    @endforeach
                @endif
            </div>
            </div>
            <div class="col-sm-9 pt-4">
                <h5>Ürünler</h5>
                @if (count($products) > 0)
                <div class="card-group">
                    @foreach ($products as $product)
                    <div class="card" style="width:25%; height:360px;">
                        <img src="{{ asset("storage/public/productImages/".$product->images[0]->image_url) }}" class="card-img-top" alt="{{ $product->images[0]->alt }}" style="width: 12rem;"/>
                        <div class="card-body">
                          <h5 class="card-title">{{ $product->name }}</h5>
                          <p class="card-text">{{ $product->lead }}</p>
                          <a href="{{ "sparis-ver/$product->product_id" }}" class="btn btn-primary">Spariş Ver</a>
                        </div>
                      </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>