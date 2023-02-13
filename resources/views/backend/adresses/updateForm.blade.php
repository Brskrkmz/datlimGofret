@extends('backend.shared.backendThema')
@section('title', 'Kullanıcı Adres Modülü')
@section('subTitle', 'Adres Güncelle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url("/users/$user->user_id/adress/$addr->adress_id") }}" method="post" autocomplete = "off" novalidate>
  @csrf
  @method('PUT')
  <input type="text" hidden value="{{ $user->user_id }}" name="user_id"> 
  <input type="text" hidden value="{{ $addr->adress_id }}" name="adress_id"> 
  {{-- Güncellemeler sırasında unique olan alanların güncellemede sorun çıkarmaması için id bilgisini alıp request alanına post edilmesi gerekir. bunun için gizli bir input kullandık. --}}
  <div class="row">
      
    <div class="col-log-6">
      <x-input type="text" label="Şehir" placeholder="Şehir giriniz" field="city" value="{{ $addr->city }}" />
    <div>
    <div class="col-log-6">
      <x-input type="text" label="İlçe" placeholder="İlçe giriniz" field="district" value="{{ $addr->district }}" />
    </div>
    <div class="col-12  mt-2">
      <x-textarea value="{{ $addr->adress }}" placeholder="Açık adres giriniz" label="Adres" field="adress" />  
    </div>
    <div class="col-12  mt-2">
      <x-input type="text" label="İlçe" placeholder="İlçe giriniz" field="zipcode" value="{{ $addr->zipcode }}" />
    </div>
    <div class="col-10 mt-3 ml-1">      
      <x-checkbox label="Varsayılan" field="is_default" checked=" {{ $addr->is_default }} " />
  </div>

  <div class="col-4">
    <button type="submit" class="btn btn-primary mb-3">GÜNCELLE</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection

