@extends('backend.shared.backendThema')
@section('title', 'Ürünler Modülü')
@section('subTitle', 'Fotoğraf Güncelle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url("/productImages/$product->product_id/images/$productImage->image_id") }}" method="post" autocomplete = "off" novalidate enctype ="miltipart/form-data">
  @csrf
  @method('PUT')
  <input type="text" hidden value="{{ $product->product_id }}" name="product_id"> 
  <input type="text" hidden value="{{ $productImage->image_id }}" name="image_id"> 
  {{-- Güncellemeler sırasında unique olan alanların güncellemede sorun çıkarmaması için id bilgisini alıp request alanına post edilmesi gerekir. bunun için gizli bir input kullandık. --}}
    
    <div class="row" >
      <div class="col-12  mt-2">
        <x-input type="file" label="Dosya Yükle" placeholder="" field="image_url" />
        <img src="{{ asset("storage/productImages/$productImage->image_url") }}" alt="{{ $productImage->alt }}" width ="100px" height="100px"> 
        {{-- Resim dosyalarına ulaşmak için klasörün puplic içerisinde olması gerekir. Normal olan yolla işler tamamlanıp kayıt alınıp tekrar ulaşmak gerektiğinde terminale php artisan storage:link komutu yazılır  --}}
      </div>
      <div class="col-12  mt-2">
        <x-input type="text" label="Açıklama" placeholder="Kısa açıklama Giriniz" field="alt" value="{{ $productImage->alt }}"/>
      </div>
      <div class="col-12  mt-2">
        <x-input type="text" label="Sıra No" placeholder="Sıra no giriniz" field="seg" value="{{ $productImage->seg }}"/>
      </div>
      <div class="col-10 mt-3 ml-1">
        <x-checkbox label="Aktif-Pasif" field="is_active" checked=" {{ $productImage->is_active }} " />
    </div><br/>

  <div class="col-4">
    <button type="submit" class="btn btn-primary mb-3">GÜNCELLE</button>
  </div>
  </div>
</form>

<script type="text/javascript" src="{{ asset('build/assets/app-4750b6e5.js') }}"> </script>

@endsection

