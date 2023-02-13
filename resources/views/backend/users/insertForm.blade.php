@extends('backend.shared.backendThema')
@section('title', 'Kullanıcı Modülü')
@section('subTitle', 'Yeni Kullanıcı Ekle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url('/users') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-12  mt-2">
      <x-input type="text" label="Ad Soyad" placeholder="Ad Soyad giriniz" field="name" />
    </div>
    <div class="col-12  mt-2">
      <x-input type="email" label="E-posta Giriniz" placeholder="name@example.com" field="email" />
    </div>
    <div class="col-12  mt-2">
      <x-input type="password" label="Şifre Giriniz" placeholder="Şifre Giriniz" field="password" />
    </div>
    <div class="col-12  mt-2">
      <x-input type="password" label="Şifre Tekrarı" placeholder="Şifre Tekrar Giriniz" field="password_confirmation" />
    </div>
    <div class="col-6 mt-3">
      <x-checkbox label="Yetkili Kullanıcı" field="is_admin" checked="" />
  </div>
    <div class="col-6 mt-3">      
      <x-checkbox label="Aktif-Pasif" field="is_active" checked="" />
  </div>
  <div class="col">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection
