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
      <x-input type="text" label="Şehir" placeholder="Şehir giriniz" field="city" value="{{ $addr->district) }}" />
    <div>
    <div class="col-log-6">
      <label for="district" class="form-label">İlçe</label>
      <input type="text" class="form-control" id="district" name="district" placeholder="İlçe girirniz" value="{{ old("district", $addr->district) }}">
      @error('district')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12  mt-2">
      <label for="adress" class="col-sm-2 col-form-label">Açık Adres</label>
      <textarea name="adress" class="form-control" id="adress" cols="100" rows="5" value="">{{ old("adress", $addr->adress) }}</textarea>
      @error('adress')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12  mt-2">
      <label for="zipcode" class="col-sm-2 col-form-label">Posta Kodu</label>
      <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ old("adress", $addr->zipcode) }}">
      @error('zipcode')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-10 mt-3 ml-1">            
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1" data-on="Aktif" data-off="Pasif" @if ($addr->is_default == 1) checked @endif 
      data-toggle="toggle" data-onstyle="warning">
      <label class="form-check-label" for="is_default">Varsayılan</label>
    </div>
  </div>

  <div class="col-4">
    <button type="submit" class="btn btn-primary mb-3">GÜNCELLE</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection


