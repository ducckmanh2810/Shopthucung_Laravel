@extends('layout')
@section('content')
<!--Main-->
<div class="login-form" style="height: unset !important; margin-top: -105px!important;">
    <div class="main" style="padding-top: 180px; padding-bottom: 15px; margin-bottom: 0;">
        
        @if(Session::has('thongbao'))
            <div class="alert alert-success" role="alert">
                {{Session::get('thongbao')}}
            </div>
        @endif

        <form action="{{route('register')}}" method="POST" class="form" style="width: 400px;" id="form-1">
        @csrf

            <h3 class="heading">Đăng ký tài khoản</h3>
            <div class="dont-have-account">
                Bạn đã có tài khoản? <a class="account-register" href="{{ URL::to('login')}}">Đăng nhập</a>
            </div>

            <div class="spacer"></div>

           <style>
            .form-group{ margin-bottom: 0; }
           </style>


            <div class="form-group">
                <label class="control-label text-left">Họ và tên</label>
                <div>
                   <input type="text" name="name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Email</label>
                <div>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Mật khẩu</label>
                <div>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Địa chỉ</label>
                <div>
                    <input type="text" name="address" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Điện thoại</label>
                <div>
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Ngày sinh</label>
                <div>
                    <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" required />
                </div>
            </div>

            <button type="submit" value="Create" class="form-submit" name="register_submit">Đăng ký</button>

        </form>
    </div>
</div>
@endsection