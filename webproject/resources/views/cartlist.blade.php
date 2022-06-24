@extends('master')
@section('content')
<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-row align-items-center">
                    <a href="/">
                        <span class="ml-2">ادامه خرید</span> <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($products->count())
                    <div class="product-details mr-2">
                        <div class="d-flex justify-content-between">
                            <span>شما {{ $products->count() }} کالا در سبد خرید خود دارید</span>
                        </div>
                        @foreach ($products as $product)
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                            <div class="d-flex flex-row">
                                <img class="rounded" src="{{ $product->gallery }}" width="80">
                                <div class="me-2">
                                    <span class="font-weight-bold d-block">{{ $product->name }}</span>
                                    <span class="spec">{{ $product->short_description }}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <span class="d-block ms-5 font-weight-bold">{{ $product->price }} تومان</span>
                                <a href="/remove_cart/{{$product->cart_id}}" class="btn btn-warning">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="alert alert-warning">در حال حاضر سبدخرید شما خالی می باشد.</p>
                @endif
            </div>
            <div class="card-footer">
                @if ($products->count())
                    <a class="btn btn-success" href="/order_now">سفارش</a>
                @else
                    <a class="btn btn-primary" href="/">بازگشت</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
