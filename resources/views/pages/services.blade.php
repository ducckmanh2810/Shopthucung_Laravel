@extends('layout')
@section('content')

<style>
@media (max-width: 992px) {
    .body {
        width: unset;
        margin: 0 auto;
    }
}
</style>

<div class="post-slider">
    <div class="post-wrapper">
        <div class="post">
            <h1 style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%);"
                class="text-white mb-5">
                Dịch vụ chăm súc thú cưng tại PetStore

                <div class="row mt-5">
                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-paw"></i>
                            <div class="mainServices__content">
                                <h3>Chăm Sóc</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-cutlery"></i>
                            <div class="mainServices__content">
                                <h3>Ăn Uống</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-gavel"></i>
                            <div class="mainServices__content">
                                <h3>Đồ chơi & Phụ kiện</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </h1>
            <img src="{{ asset('frontend/img/banner_5-scaled.jpg')}}" alt="">
        </div>
    </div>

</div>

<div class="modal">
    <div class="modal-overlay modal-toggle"></div>
    <div class="modal-wrapper modal-transition">

        <div class="modal-header">
            <button class="modal-close modal-toggle btn fa fa-times" style="outline: none;"></button>
            <h2 class="modal-heading">Xem thêm</h2>
        </div>

        <style>
        .form-horizontal .control-label {
            text-align: unset !important;
        }
        </style>

    </div>
</div>

<div class="body">
    <div class="container-fluid" style="padding: 0!important;">
        <div style="background-image: url('frontend/img/chamsocthucung.png')" class="service-banner">
            <div class="boxservice">
                <h3 class="h1-title">
                    PetStore CHĂM SÓC TOÀN DIỆN, “THIÊN ĐƯỜNG" CỦA THÚ CƯNG!
                </h3>
                <p>Với mong muốn được trở thành ngôi nhà thứ hai của thú cưng, Petstore mang đến những dịch vụ lẫn sản
                    phẩm cần thiết nhất mà mọi người bạn dễ thương này.</p>

                <button class="btn btn-danger mt-5 modal-toggle">Xem thêm!</button>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4" style="padding: 15px!important;">
            <div style="background-color: #2885BA" class="service-list__content-box">
                <img src="{{ asset('frontend/img/svmeo.jpg')}}" alt="">
                <h3 class="h1-title">
                    1. PET STORE - NƠI CHĂM SÓC THÚ CƯNG CHẤT LƯỢNG!
                </h3>

                <p>
                    Những chuyến du lịch hay công tác dài ngày khiến bạn cảm thấy lo lắng khi phải gửi gắm bé yêu cho ai
                    đó chăm nom hộ?
                    Khách sạn thú cưng hiện đại sẽ giúp chủ nuôi hoàn toàn yên tâm khi “đặt phòng" cho bé!
                </p>

            </div>
        </div>
        <div class="col-lg-4" style="padding: 15px!important;">
            <div style="background-color: #B56256" class="service-list__content-box">
                <img src="{{ asset('frontend/img/khamcho.png')}}" alt="">
                <h3 class="h1-title">
                    2. PET STORE - NƠI CUNG CẤP THỨC ĂN, CÁT VỆ SINH,... CHẤT LƯỢNG NHẤT!
                </h3>

                <p>
                    Tại Pet Store, chúng tôi cung cấp mọi nhu cầu mà thú cưng cần với giá cả hợp lý và chất lượng hàng
                    đầu!
                </p>

                <p>
                    Đa dạng món ăn hấp dẫn từ các nhãn hiệu lớn trong và ngoài nước, mùi vị hấp dẫn.
                </p>
            </div>
        </div>
        <div class="col-lg-4" style="padding: 15px!important;">
            <div style="background-color: #5C9CCA" class="service-list__content-box">
                <img src="{{ asset('frontend/img/svmeo3.jpg')}}" alt="">
                <h3 class="h1-title">
                    3. CUNG CẤP CÁC DỊCH VỤ SPA, TẮM RỬA,... CHẤT LƯỢNG NHẤT!
                </h3>

                <p>
                    Những chuyến du lịch hay công tác dài ngày khiến bạn cảm thấy lo lắng khi phải gửi gắm bé yêu cho ai
                    đó chăm nom hộ?
                    Khách sạn thú cưng hiện đại sẽ giúp chủ nuôi hoàn toàn yên tâm khi “đặt phòng" cho bé!
                </p>
            </div>
        </div>

    </div>

    <div class="service-text mb30">
        <div class="service-text__content">
            <h2 class="h2-title">
            </h2>
            <h2 class="h2-title">Chăm sóc toàn diện, tận tâm và xuất phát từ tình yêu với thú cưng chính là tôn chỉ của
                mọi dịch vụ luôn sẵn sàng đón tiếp quý khách!</h2>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <img class="banner-service" src="{{ asset('frontend/img/svbg.jpg')}}" alt="">

        </div>
    </div>
</div>
@endsection