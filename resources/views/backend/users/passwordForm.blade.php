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
      <label for="sifre" class="col-sm-2 col-form-label">Şifre Giriniz</label>
      <input type="password" class="form-control" id="sifre" name="sifre">
      @error('sifre')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-log-6">
      <label for="sifre_confirmed" class="col-sm-2 col-form-label">Şifre Tekrar Giriniz</label>
      <input type="password" class="form-control" id="sifre_confirmed" name="sifre_confirmation">
    </div>
    
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection
