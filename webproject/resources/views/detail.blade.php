@extends('master')
@section('content')
<div class="container">
    <div class="row">
		<div class="col-sm-6">
            <a href="/">برگشت</a>
            <h2>{{ $product->name }}</h2>
            <h3>قیمت: {{ $product->price }} تومان</h3>
            <h4>شاخه: {{ $product->category }}</h4>
            <h4>توضحیحات: {{ $product->description }}</h4>
            <br>
            <form action="/add_to_cart" method="POST">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                @csrf
                <button class="btn btn-success">افزودن به سبد خرید</button>
            </form>
        </div>
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product->gallery }}" alt="{{$product->name }}">
        </div>
    </div>
    <div class="row mt-2">
        @auth
            <div class="container mt-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-8">
                        @forelse ($comments as $comment)
                            <div class="d-flex flex-column comment-section">
                                <div class="bg-white p-2">
                                    <div class="d-flex flex-row user-info"><img class="rounded-circle ms-2" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" width="40">
                                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{ $comment->user->name }}</span></div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text">{{ $comment->content }}</p>
                                    </div>
                                </div>
                                <div class="bg-white">
                                    <div class="d-flex flex-row fs-12">
                                        <div class="like p-2 cursor"><i class="bi bi-hand-thumbs-up"></i> <span class="ml-1">پسندیدن</span></div>
                                        <div class="like p-2 cursor"><i class="bi bi-reply"></i> <span class="ml-1">پاسخ</span></div>
                                        <div class="like p-2 cursor"><i class="bi bi-share"></i> <span class="ml-1">به اشتراک گذاشتن</span></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="alert alert-warning">در حال حاظر نظری برای این محصول وجود ندارد.</p>
                        @endforelse
                        <div class="bg-light p-2">
                            <form action="{{ route('comment', $product->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="product" value="{{ $product->id }}">
                                <div class="d-flex flex-row align-items-start">
                                    <img class="rounded-circle ms-2" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" width="40">
                                    <textarea name="content" class="form-control ml-1 shadow-none textarea"></textarea>
                                </div>
                                <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none">ارسال</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p class="alert alert-warning">برای ثبت نظر <a href="{{ route('login') }}">وارد</a> یا <a href="{{ route('register') }}">ثبت نام</a> کنید</p>
        @endauth
    </div>
</div>
@endsection
