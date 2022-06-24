@extends('master')
@section('content')
  <div id="product-slider" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#product-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="1"></button>
      <button type="button" data-bs-target="#product-slider" data-bs-slide-to="1" aria-label="2"></button>
      <button type="button" data-bs-target="#product-slider" data-bs-slide-to="2" aria-label="3"></button>
    </div>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      @foreach ($products->slice(0, 3) as $product)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <a href="{{ route('product', $product->id) }}">
            <img class="d-block w-100 slider-img" src="{{ $product->gallery }}" alt="Chania">
          <div class="carousel-caption slider-text">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>

    <!-- Left and right controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#product-slider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">قبلی</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#product-slider" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">بعدی</span>
    </button>
  </div>
  <div class="container">
    <h4 class="mt-3 mb-2">محصولات پرطرفدار</h4>
    <div class="row justify-content-between trend-products">
      @foreach ($products as $product)
        <div class="card">
          <a href="{{ route('product', $product->id) }}">
            <img src="{{ $product->gallery }}" class="card-img-top" alt="{{ $product->name }}">
          </a>
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->short_description }}</p>
            <p class="card-text">{{ $product->price }} تومان</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
