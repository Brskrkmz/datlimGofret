@extends('backend.shared.backendThema')
@section('title', 'Kullanıcı Modülü')
@section('subTitle', 'Kullanıcı Güncelle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url("/users/$user->user_id") }}" method="post">
  @csrf
  @method('PUT')
  <input type="text" hidden value="{{ $user->user_id }}" name="user_id"> 
  {{-- Güncellemeler sırasında unique olan alanların güncellemede sorun çıkarmaması için id bilgisini alıp request alanına post edilmesi gerekir. bunun için gizli bir input kullandık. --}}
  <div class="row">
    <div class="col-log-6">
      <label for="name" class="form-label">Ad Soyad</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Ad soyad giriniz" value="{{ old("name", $user->name) }}">
      @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-log-6">
      <label for="email" class="form-label">E-posta Giriniz</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old("email", $user->email) }}">
      @error('email')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-log-6">
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1" data-on="Aktif" data-off="Pasif" @if ($user->is_admin == 1) checked @endif 
      data-toggle="toggle" data-onstyle="warning">
      <label class="form-check-label" for="is_admin">Yetkili Kullanıcı</label>
    </div>
  </div>
    <div class="col-log-6">            
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" data-on="Aktif" data-off="Pasif" @if ($user->is_active == 1) checked @endif 
      data-toggle="toggle" data-onstyle="warning">
      <label class="form-check-label" for="is_active">Aktif-Pasif</label>
    </div>
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection


