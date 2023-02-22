@extends('backend.shared.backendThema')
@section('title', 'Kullanıcı Modülü')
@section('subTitle', 'Kullanıcılar')
@section('add_new_url', url("/users/create"))
@section('btnText','Yeni Ekle')
@section('btnIcon','fa fa-plus')

@section('content')
<table class="table table-striped table-sm table-hover">

  <thead>
    <tr >
      <th scope="col">Sıra No</th>
      <th scope="col">Ad Soyad</th>
      <th scope="col">e-posta</th>
      <th scope="col">Yetkili</th>
      <th scope="col">Durum</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
    @if (count($users) > 0)
        @foreach ($users as $user)
        <tr id="{{ $user->user_id }}">
            <td scope="col"><center> {{ $loop->iteration }} </center></td>
            <td scope="col"><center> {{ $user->name }} </center></td>
            <td scope="col"><center> {{ $user->email }} </center></td>
            <td scope="col"><center> 
              @if ($user->is_admin == 1)
              <span class="badge bg-success">Yetkili</span>
              @else
              <span class="badge bg-danger ">Yetkisiz</span>
              @endif
            </center></td>
            <td scope="col"><center> 
              @if ($user->is_active == 1)
              <span class="badge bg-success">Aktif</span>
              @else
              <span class="badge bg-secondary ">Pasif</span>
              @endif
            </center></td>
            <td scope="col" style="padding-left: 8% "> <center>
              <ul class="nav float-start">
                <li class="nav-item">
                  <a href="{{ url("/users/$user->user_id/edit") }}" class="nav-link text-black">
                    <i class="fa fa-edit"></i>
                  <span>Güncelle</span>
                  </a>
                </li>
                <li class="nav-item">
                {{-- href="{{ url("/users/$user->user_id") }}" --}}
                  <a class="nav-link text-black list-item-delete" kullanici_id="{{ $user->user_id }}" href="{{ url("/users/$user->user_id") }}"> 
                    <i class="fa fa-trash"></i>
                  <span>Sil</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url("/users/$user->user_id/changePassword") }}" class="nav-link text-black">
                    <i class="fa fa-lock"></i>
                  <span>Şifre Değiştir</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url("/users/$user->user_id/adress") }}" class="nav-link text-black">
                    <i class="fa-thin fa-address-card"></i>
                  <span>Adres</span>
                  </a>
                </li>
              </ul>
            </center></td>
          </tr>
        @endforeach
    @else
    <tr>
        <td colspan="6">
          <p class="text-center" style="color:rgb(197, 113, 113); font-size:16px;">Herhangi bir kullanıcı kaydı bulunamadı.</p>
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




