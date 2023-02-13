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
      <x-input type="text" label="Ad soyad giriniz" placeholder="Ad soyad giriniz" field="name" value="{{ $user->name }}" />
    </div>
    <div class="col-log-6">
      <x-input type="email" label="E-posta Giriniz" placeholder="name@example.com" field="email" value="{{ $user->email }}" />
    </div>
    <div class="col-log-6">
      <x-checkbox label="Yetkili Kullanıcı" field="is_admin" checked=" {{ $user->is_admin }} " />
  </div>
    <div class="col-log-6"> 
      <x-checkbox label="Aktif-Pasif" field="is_active" checked=" {{ $user->is_active }} " />
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection


