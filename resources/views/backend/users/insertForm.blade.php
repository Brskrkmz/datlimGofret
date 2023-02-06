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
      <label for="name" class="form-label">Ad Soyad</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Ad soyad giriniz" value="{{ old("name") }}">
      @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12  mt-2">
      <label for="email" class="form-label">E-posta Giriniz</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old("email") }}">
      @error('email')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12  mt-2">
      <label for="password" class="col-sm-2 col-form-label">Şifre Giriniz</label>
      <input type="password" class="form-control" id="password" name="password">
      @error('password')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12  mt-2">
      <label for="password_confirmation" class="col-sm-2 col-form-label">Şifre Tekrar Giriniz</label>
      <input type="password" class="form-control" id="password_confirmed" name="password_confirmation">
    </div>
    <div class="col-6 mt-3">
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1">
      <label class="form-check-label" for="is_admin">Yetkili Kullanıcı</label>
    </div>
  </div>
    <div class="col-6 mt-3">            
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1">
      <label class="form-check-label" for="is_active">Aktif-Pasif</label>
    </div>
  </div>
  <div class="col">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection
