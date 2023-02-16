@extends('backend.shared.backendThema')
@section('title', 'Kategori Modülü')
@section('subTitle', 'Kategori Güncelle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url("/users/$category->category_id") }}" method="post">
  @csrf
  @method('PUT')
  <input type="text" hidden value="{{ $category->category_id }}" name="category_id"> 
  {{-- Güncellemeler sırasında unique olan alanların güncellemede sorun çıkarmaması için id bilgisini alıp request alanına post edilmesi gerekir. bunun için gizli bir input kullandık. --}}
  <div class="row">
    <div class="col-log-6">
      <x-input type="text" label="Kategori" placeholder="Kategori adı giriniz" field="name" value="{{ $category->name }}" />
    </div>
    <div class="col-log-6">
      <x-input type="text" label="Slug" placeholder="Slug değeri giriniz" field="slug" value="{{ $category->slug }}" />
    </div>
    <div class="col-log-6"> 
      <x-checkbox label="Aktif-Pasif" field="is_active" checked=" {{ $category->is_active }} " />
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
    </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection


