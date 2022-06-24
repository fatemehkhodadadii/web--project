@extends('master')
@section('content')
<div class="container">
  <h4 class="mt-3 mb-2">نتیجه جستجو</h4>
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
