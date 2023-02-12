@extends('backend.shared.backendThema')
@section('title', 'Kullanıcı Adres Modülü')
@section('subTitle', 'Yeni Adres Ekle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url("/users/$user->user_id/adress") }}" method="post">
  @csrf
  <input type="hidden" name="user_id" value="{{ $user->user_id }}">
  <div class="row" >
    <div class="col-12  mt-2">
      <x-input type="text" label="Şehir" placeholder="Şehir giriniz" field="city" value="" />
    </div>
    <div class="col-12  mt-2">
      <x-input type="text" label="İlçe" placeholder="İlçe giriniz" field="district" value="" />
    </div>
    <div class="col-12  mt-2">
      <x-input type="text" label="Posta Kodu" placeholder="Posta kodu giriniz" field="zipcode" value="" />
    </div>
    <div class="col-12  mt-2">
      <x-textarea value="" placeholder="Açık adres giriniz" label="Adres" field="adress" />
      
    </div>
    <div class="col-10 mt-3 ml-1">
      <x-checkbox label="Varsayılan" field="is_default" checked="" />
  </div><br/>
  <div class="col-6 mt-2">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection
