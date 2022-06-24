@extends('master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h2>لیست سفارشات</h2>
                <br><br>
                @foreach ($orders as $order)
                <div class="row search-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{$order->id}}">
                            <img class="trending-img" src="{{$order->gallery}}">
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <h2>{{$order->name}}</h2>
                        <h5>وضعیت حمل و نقل: {{$order->status}}</h5>
                        <h5>وضعیت پرداخت: {{$order->payment_status}}</h5> 
                        <h5>روش پرداخت: {{$order->payment_method}}</h5>
                        <h5>آدرس تحویل: {{$order->address}}</h5>
                        <h5>قیمت: {{$order->price}} تومان</h5>   
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>    
    </div>
@endsection
