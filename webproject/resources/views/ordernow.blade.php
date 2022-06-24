@extends('master')
@section('content')
<div class="container">
  <h1 class="h3 mb-5">پرداخت</h1>
  {{-- <div class="row">
    <div class="col-lg-3"> --}}
      <div class="card position-sticky top-0">
        <div class="p-3 bg-light bg-opacity-10">
          <h6 class="card-title mb-3">خلاصه سفارش</h6>
          <div class="d-flex justify-content-between mb-1 small">
            <span>قیمت</span> <span>{{$total}} تومان</span>
          </div>
          <div class="d-flex justify-content-between mb-1 small">
            <span>هزینه حمل و نقل</span> <span>100 تومان</span>
          </div>
          {{-- <div class="d-flex justify-content-between mb-1 small">
            <span>Coupon (Code: NEWYEAR)</span> <span class="text-danger">-$10.00</span>
          </div> --}}
          <hr>
          <div class="d-flex justify-content-between mb-4 small">
            <span>مجموع</span> <strong class="text-dark">{{$total+100}} تومان</strong>
          </div>
          <form action="order_place" method="POST">
            @csrf
            <div class="form-group">
              <textarea class="form-control" name="address" placeholder="آدرس خود را وارد کنید" required="required"></textarea>
            </div>
            <div class="form-group">
              <label for="">روش پرداخت</label>
              <p><input id="online" value="Online Payment" type="radio" name="payment"> <label for="online">پرداخت آنلاین</label></p>
              <p><input id="delivary" value="Payment on Delivary" type="radio" name="payment"> <label for="delivary">پرداخت در محل</label></p>
            </div>
            <div class="form-check mb-1 small">
              <input class="form-check-input" type="checkbox" value="" id="tnc">
              <label class="form-check-label" for="tnc">
                <a href="#">شرایط و ضوابط</a> را قبول دارم.
              </label>
            </div>
            <div class="form-check mb-3 small">
              <input class="form-check-input" type="checkbox" value="" id="subscribe">
              <label class="form-check-label" for="subscribe">
                درباره به‌روزرسانی‌ها و رویدادهای محصول ایمیل دریافت کنید. اگر نظر خود را تغییر دادید، می توانید در هر زمانی اشتراک خود را لغو کنید.
              </label>
            </div>
            <button class="btn btn-primary w-100 mt-2">ثبت سفارش</button>
          </form>
        </div>
      </div>
    {{-- </div>
  </div> --}}
</div>
    {{-- <div class="custom-product">
        <h1 style="margin-right:365px;">سفارش</h1>
        <div class="col-sm-6">
            <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>قیمت</td>
                    <td>{{$total}} تومان</td>
                  </tr>
                  <tr>
                    <td>مالیات</td>
                    <td>0 تومان</td>
                  </tr>
                  <tr>
                    <td>هزینه حمل و نقل</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>مجموع</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>

              <form class="custom-form" action="order_place" method="POST">
                @csrf
                <div class="form-group">
                  <textarea class="form-control" name="address" placeholder="آدرس خود را وارد کنید" required="required"></textarea>
                </div>
                <div class="form-group">
                  <label for="">روش پرداخت</label>
                  <p><input id="online" value="Online Payment" type="radio" name="payment"> <label for="online">پرداخت آنلاین</label></p>
                  <p><input id="delivary" value="Payment on Delivary" type="radio" name="payment"> <label for="delivary">پرداخت در محل</label></p>
                </div>
                <button type="submit" class="btn btn-default">سفارش</button>
              </form>
        </div>    
    </div> --}}
@endsection
