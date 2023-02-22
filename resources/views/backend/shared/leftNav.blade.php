<ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">
        <i class="fa fa-home" aria-hidden="true"></i>
        <span>Yönetim Paneli</span>
      </a>
    </li> 
    <li class="nav-item">
      <a class="nav-link {{ Str::of(url()->current())->contains("/users") ? "active" : ""}}" href="/users">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>Kullanıcılar</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Str::of(url()->current())->contains("/categories") ? "active" : ""}}" href="/categories">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span>Kategoriler</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Str::of(url()->current())->contains("/products") ? "active" : ""}}" href="/products">
        <i class="fa fa-product-hunt"></i>
        <span>Ürünler</span>
      </a>
    </li>
  </ul>