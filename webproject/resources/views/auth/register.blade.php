@extends('master')
@section('content')
<section class="vh-100">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-6">
        <div class="card mt-5" style="border-radius: 15px;">
          <div class="card-body">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-3">
                  <h6 class="mb-0">نام و نام خانوادگی</h6>
                </div>
                <div class="col-md-9 pe-5">
                  <input type="text" name="name" class="form-control form-control-lg" />
                </div>
              </div>
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-3">
                  <h6 class="mb-0">آدرس ایمیل</h6>
                </div>
                <div class="col-md-9 pe-5">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="example@example.com" />
                </div>
              </div>
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-3">
                  <h6 class="mb-0">رمزعبور</h6>
                </div>
                <div class="col-md-9 pe-5">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="********" />
                </div>
              </div>
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-3">
                  <h6 class="mb-0">تکرار رمزعبور</h6>
                </div>
                <div class="col-md-9 pe-5">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="********" />
                </div>
              </div>
              <div class="px-5 py-4">
                <button type="submit" class="btn btn-primary btn-lg">ثبت نام</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
