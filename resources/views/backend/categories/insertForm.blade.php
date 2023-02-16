@extends('backend.shared.backendThema')
@section('title', 'Kategori Modülü')
@section('subTitle', 'Yeni Kategori Ekle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url('/categories') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-12  mt-2">
      <x-input type="text" label="Kategori" placeholder="Kategori giriniz" field="name" />
    </div>
    <div class="col-12 mt-3">      
      <x-checkbox label="Aktif-Pasif" field="is_active" checked="" />
  </div>
  <div class="col-6 mt-3">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection
