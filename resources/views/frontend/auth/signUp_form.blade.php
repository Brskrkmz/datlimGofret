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
    <div class="row">
      <div class="col-4 offset-4">
        <main class="mt-5">
          <form action="{{ url('/uye-ol') }}" method="post">
          @csrf
          <h1>Üye Olun</h1>
          <div>
            <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz" field="name" type="email"/>
          </div>  
          <div class="mt-2">
            <x-input label="e-posta Giriniz" placeholder="e-posta Giriniz" field="email" type="password"/>
          </div>
          <div class="mt-2">
            <x-input label="Şifre Giriniz" placeholder="Şifre Giriniz" field="password" />
          </div>
          <div class="mt-2">
            <x-input label="Şifre Tekrarı" placeholder="Şifreyi tekrar Giriniz" field="password_confirmaion" type="password"/>
          </div>
          <div  class="mt-2">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Kayıt Ol</button>
          </div>
          </form>
        </main>
      </div>
    </div>
  </div>
</body>
</html>