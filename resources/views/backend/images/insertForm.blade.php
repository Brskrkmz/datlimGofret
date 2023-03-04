@extends('backend.shared.backendThema')
@section('title', 'Ürünler Modülü')
@section('subTitle', 'Yeni Fotoğraf Ekle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url("/productImages/$product->product_id/images") }}" method="post" novalidate enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->product_id }}">
  <div class="row" >
    <div class="col-12  mt-2">
      <x-input type="file" label="Dosya Yükle" placeholder="" field="image_url" />
    </div>
    <div class="col-12  mt-2">
      <x-input type="text" label="Açıklama" placeholder="Kısa açıklama Giriniz" field="alt" />
    </div>
    <div class="col-12  mt-2">
      <x-input type="text" label="Sıra No" placeholder="Sıra no giriniz" field="seg" />
    </div>
    <div class="col-10 mt-3 ml-1">
      <x-checkbox label="Aktif-Pasif" field="is_active" checked="" />
  </div><br/>
  <div class="col-6 mt-2">
    <button type="submit" class="btn btn-primary mb-3">KAYDET</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection
