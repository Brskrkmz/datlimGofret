@extends('backend.shared.backendThema')
@section('title', 'Ürün Modülü')
@section('subTitle', 'Ürünler')
@section('add_new_url', url("/products/create"))
@section('btnText','Yeni Ekle')
@section('btnIcon','fa fa-plus')

@section('content')
<table class="table table-striped table-sm table-hover">

  <thead>
    <tr>
      <th scope="col">Sıra No</th>
      <th scope="col">Ürün Adı</th>
      <th scope="col">Kategori</th>
      <th scope="col">Fiyat</th>
      <th scope="col">Eski Fiyat</th>
      <th scope="col">Durum</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
    @if (count($products) > 0)
        @foreach ($products as $product)
        <tr id="{{ $product->product_id }}">
            <td scope="col"><center>{{ $loop->iteration }}<center></td>
            <td scope="col"><center>{{ $product->name }}<center></td>
            <td scope="col"><center>{{ $product->category->name }}<center></td>
            <td scope="col"><center>{{ $product->price }}<center></td>
            <td scope="col"><center>{{ $product->old_price }}<center></td>
            <td scope="col"><center>
              @if ($product->is_active == 1)
              <span class="badge bg-success">Aktif</span>
              @else
              <span class="badge bg-secondary ">Pasif</span>
              @endif
            </center></td>
            <td scope="col" style="padding-left: 8%;"><center>
              <ul class="nav float-start">
                <li class="nav-item">
                  <a href="{{ url("/products/$product->product_id/edit") }}" class="nav-link text-black">
                    <i class="fa fa-edit"></i>
                  <span>Güncelle</span>
                  </a>
                </li>
                <li class="nav-item">
                {{-- href="{{ url("/users/$product->product_id") }}" --}}
                  <a class="nav-link text-black list-item-delete" kullanici_id="{{ $product->product_id }}" href="{{ url("/products/$product->product_id") }}"> 
                    <i class="fa fa-trash"></i>
                  <span>Sil</span>
                  </a>
                </li>
              </ul>
            </center></td>
          </tr>
        @endforeach
    @else
    <tr>
        <td colspan="8">
          <p class="text-center" style="color:rgb(197, 113, 113); font-size:16px;">Ürün kaydı bulunamadı.</p>
        </td>
    </tr>
    @endif
</tbody>
</table>

<script type="text/javascript">

  $('.list-item-delete').click(function(e){
   e.preventDefault()
   let url = $(this).attr("href")
     if(url!==null){
       if(confirm('Bu kaydı silmek istediğinizden emin misiniz?')){
         axios.delete(url).then(result => {
           console.log(result.data)
           $("#" + result.data.id).remove()
         }).catch(error => {
           console.log(error)
         })
 
       }
     }
    })
 </script>
@endsection




