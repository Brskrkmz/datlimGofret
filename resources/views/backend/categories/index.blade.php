@extends('backend.shared.backendThema')
@section('title', 'Kategori Modülü')
@section('subTitle', 'Kategoriler')
@section('add_new_url', url("/categories/create"))
@section('btnText','Yeni Ekle')
@section('btnIcon','fa fa-plus')

@section('content')
<table class="table table-striped table-sm table-hover">

  <thead>
    <tr>
      <th scope="col">Sıra No</th>
      <th scope="col">Adı</th>
      <th scope="col">slug</th>
      <th scope="col">Durum</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
    @if (count($categories) > 0)
        @foreach ($categories as $category)
        <tr id="{{ $category->category_id }}">
            <td scope="col"><center>{{ $loop->iteration }}</center></td>
            <td scope="col"><center>{{ $category->name }}</center></td>
            <td scope="col"><center>{{ $category->slug }}</center></td>
            <td scope="col"><center>
              @if ($category->is_active == 1)
              <span class="badge bg-success">Aktif</span>
              @else
              <span class="badge bg-secondary ">Pasif</span>
              @endif
            </center></td>
            <td scope="col" style="padding-left: 12%;">
              <ul class="nav float-start">
                <li class="nav-item">
                  <a href="{{ url("/users/$category->category_id/edit") }}" class="nav-link text-black">
                    <i class="fa fa-edit"></i>
                  <span>Güncelle</span>
                  </a>
                </li>
                <li class="nav-item">
                {{-- href="{{ url("/users/$category->category_id") }}" --}}
                  <a class="nav-link text-black list-item-delete" kullanici_id="{{ $category->category_id }}" href="{{ url("/users/$category->category_id") }}"> 
                    <i class="fa fa-trash"></i>
                  <span>Sil</span>
                  </a>
                </li>
              </ul>
            </td>
          </tr>
        @endforeach
    @else
    <tr>
        <td colspan="5">
          <p class="text-center" style="color:rgb(197, 113, 113); font-size:16px;">Kategori kaydı bulunamadı.</p>
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




