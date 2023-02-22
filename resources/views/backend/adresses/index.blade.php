@extends('backend.shared.backendThema')
@section('title', 'Kullanıcı Adres Modülü')
@section('subTitle', 'Adresler')
@section('add_new_url', url("/users/$user->user_id/adress/create"))
@section('btnText','Yeni Adres Ekle')
@section('btnIcon','fa fa-plus')

@section('content')
<table class="table table-striped table-sm table-hover table-responsive">

  <thead>
    <tr>
      <th scope="col">Sıra No</th>
      <th scope="col">Şehir</th>
      <th scope="col">İlçe</th>
      <th scope="col">Açık Adres</th>
      <th scope="col">Posta Kodu</th>
      <th scope="col">Durum</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
    @if (count($addrs) > 0)
        @foreach ($addrs as $addr)
        <tr id="{{ $addr->adress_id }}">
            <td scope="col"><center>{{ $loop->iteration }}</center></td>
            <td scope="col"><center>{{ $addr->city }}</center></td>
            <td scope="col"><center>{{ $addr->district }}</center></td>
            <td scope="col"><center>{{ $addr->adress }}</center></td>
            <td scope="col"><center>{{ $addr->zipcode }}</center></td>
            <td scope="col"><center>
              @if ($addr->is_default == 1)
              <span class="badge bg-success">Evet</span>
              @else
              <span class="badge bg-danger ">Hayır</span>
              @endif
            </center></td>
            <td scope="col" style="padding-left: 4%">
              <ul class="nav float-start">
                <li class="nav-item">
                  <a href="{{ url("/users/$user->user_id/adress/$addr->adress_id/edit") }}" class="nav-link text-black">
                    <i class="fa fa-edit"></i>
                  <span>Güncelle</span>
                  </a>
                </li>
                <li class="nav-item">
                {{-- href="{{ url("/users/$addr->adress_id") }}" --}}
                  <a class="nav-link text-black list-item-delete" kullanici_id="{{ $addr->adress_id }}" href="{{ url("/users/$user->user_id/adress/$addr->adress_id") }}"> 
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
        <td colspan="7">
          <p class="text-center" style="color:rgb(197, 113, 113); font-size:16px;">Herhangi bir adres kaydı bulunamadı.</p>
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




