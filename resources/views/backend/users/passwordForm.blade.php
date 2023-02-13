@extends('backend.shared.backendThema')
@section('title', 'Kullanıcı Modülü')
@section('subTitle', 'Şifre Değiştir')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url("/users/$user->user_id/changePassword") }}" method="post">
  @csrf

    <div class="col-log-6">
      <x-input type="password" label="Şifre Giriniz" placeholder="Şifre Giriniz" field="password" />
    </div>
    <div class="col-log-6">
      <x-input type="password" label="Şifre Tekrarı" placeholder="Şifre Tekrar Giriniz" field="password_confirmed" />
    </div>
    
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection
