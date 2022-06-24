<?php
    use App\Http\Controllers\ProductController;
    $total = 0;
    if(auth()->check()){
      $total = ProductController::cartItem();
    }
?>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">فروشگاه</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="خانه" href="/">خانه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/my_order">سفارشات</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right ms-3">
        @auth()
        <li class="nav-item dropdown">
          <a id="user-menu" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">{{ auth()->user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="user-menu">
            <li><a class="dropdown-item" title="خروج" href="{{ route('logout') }}" onclick="(e => {e.preventDefault();$('#logout').submit()})(event)">خروج</a></li>
            <form action="{{ route('logout') }}" method="post" id="logout">
              @csrf
            </form>
          </ul>
        </li>
        @else
        <li><a class="nav-link" href="{{ route('login') }}">ورود</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">ثبت نام</a></li>
        @endauth
        <li class="nav-item"><a class="nav-link" href="/cart_list">سبدخرید ({{$total}})</a></li>
      </ul>
      <form action="search" class="d-flex" role="search">
        <input name="query" class="form-control ms-2" type="search" placeholder="جستجو" aria-label="جستجو">
        <button class="btn btn-outline-success" type="submit">جستجو</button>
      </form>
    </div>
  </div>
</nav>