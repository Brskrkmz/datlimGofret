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
      <label for="city" class="form-label">Şehir</label>
      <input type="text" class="col-log-6 form-control" id="city" name="city" placeholder="Şehir giriniz" value="{{ old("city") }}">
      @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12  mt-2">
      <label for="district" class="form-label">İlçe</label>
      <input type="text" class="form-control" id="district" name="district" placeholder="İlçe giriniz" value="{{ old("district") }}">
      @error('district')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12  mt-2">
      <label for="zipcode" class="col-sm-2 col-form-label">Posta Kodu</label>
      <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ old("zipcode") }}">
      @error('zipcode')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12  mt-2">
      <label for="adress" class="col-sm-2 col-form-label">Açık Adres</label>
      <textarea name="adress" class="form-control" id="adress" cols="100" rows="5">{{ old("adress") }}</textarea>
      @error('adress')
      <span class="text-danger">{{ $message }}</span>
  @enderror
    </div>
    <div class="col-10 mt-3 ml-1">
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1">
      <label class="form-check-label" for="is_default">Varsayılan</label>
    </div>
  </div><br/>
  <div class="col-6 mt-2">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection
