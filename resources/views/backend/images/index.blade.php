@extends('backend.shared.backendThema')
@section('title', 'Ürünler Modülü')
@section('subTitle', 'Fotoğraflar')
@section('add_new_url', url("/productImages/$product->product_id/images/create"))
@section('btnText','Yeni Fotoğraf Ekle')
@section('btnIcon','fa fa-plus')

@section('content')
<table class="table table-striped table-sm table-hover table-responsive">

  <thead>
    <tr>
      <th scope="col">Sıra No</th>
      <th scope="col">Fotoğraf</th>
      <th scope="col">Açıklama</th>
      <th scope="col">Durum</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
    @if (count($product->images) > 0)
        @foreach ($product->images as $img)
        <tr id="{{ $img->image }}">
            <td scope="col"><center>{{ $img->image_id }}</center></td>
            <td scope="col"><center>{{ $img->seg }}</center></td>
            <td scope="col"><center>{{ $img->image_url }}</center></td>
            <td scope="col"><center>{{ $img->alt }}</center></td>
            <td scope="col"><center>
              @if ($img->is_active == 1)
              <span class="badge bg-success">Aktif</span>
              @else
              <span class="badge bg-danger ">Pasif</span>
              @endif
            </center></td>
            <td scope="col" style="padding-left: 4%">
              <ul class="nav float-start">
                <li class="nav-item">
                  <a href="{{ url("/productImages/$product->product_id/images/$img->image_id/edit") }}" class="nav-link text-black">
                    <i class="fa fa-edit"></i>
                  <span>Güncelle</span>
                  </a>
                </li>
                <li class="nav-item">
                {{-- href="{{ url("/productImages/$img->image_id") }}" --}}
                  <a class="nav-link text-black list-item-delete" kullanici_id="{{ $img->image_id }}" href="{{ url("/productImages/$product->product_id/images/$img->image_id") }}"> 
                    <i class="fa fa-trash"></i>
                  <span>Sil</span>
                  </a>
                </li>
              </ul>
            </td>
        @endforeach
        </tr>
    @else
    <tr>
        <td colspan="5">
          <p class="text-center" style="color:rgb(197, 113, 113); font-size:16px;">Herhangi bir kayıt bulunamadı.</p>
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




