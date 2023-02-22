@extends('backend.shared.backendThema')
@section('title', 'Ürün Modülü')
@section('subTitle', 'Yeni Ürün Ekle')
@section('add_new_url', url()->previous())
@section('btnText','Geri Dön')
@section('btnIcon','fa fa-arrow-left')

@section('content')
<form action="{{ url('/products') }}" method="post">
  @csrf
  @method("post")
  <div class="row">
    <div class="col-6  mt-2">
      <x-input type="text" label="Ürün Adı" placeholder="Ürün adı giriniz" field="name" />
    </div>
    <div class="col-6  mt-2">
      <x-input type="text" label="Fiyat" placeholder="Fiyat giriniz" field="price" />
    </div>
    <div class="col-6  mt-2">
      <x-input type="text" label="Eski Fiyat" placeholder="Eski fiyat giriniz" field="old_price" />
    </div>
    <div class="col-6  mt-2">
      <label for="category" class="form-label">Kategori</label>
      <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
        <option value="">Kategori Seçiniz</option>
        @foreach ($categories as $category)
        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
        @endforeach
      </select>   
      @error("category")
      <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
    <div class="col-12  mt-2">
      <x-input type="text" label="Kısa Açıklama" placeholder="Kısa açıklama giriniz" field="lead" />
    </div>
    <div class="col-12  mt-2">
      <x-textarea value="" label="Detaylı Açıklama" placeholder="Detaylı açıklama giriniz" field="description" />      
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
