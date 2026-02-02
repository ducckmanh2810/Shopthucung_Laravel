@extends('layout')
@section('content')
<!-- Thú cưng -->
<div class="body">

    <div class="body__mainTitle d-flex align-items-center">
        <h2>Con giống</h2>
        <b>
            <div class="d-flex justify-content-center align-items-center ml-5" style="font-size: 26px;">
                <div id="clickDog" class="text-secondary activeColor mr-3">Chó</div>
                <div id="clickCat" class="text-secondary mr-3">Mèo</div>
            </div>
        </b>

    </div>
    <div class="dog active">
        <div class="row">
            @foreach($choGiongs as $choGiong)
            <div class="col-lg-2_5 col-md-4 col-6 post2">
                <a href="{{ route('detail', ['id' => $choGiong->id_sanpham]) }}">
                    <div class="product">
                        <div class="product__img">
                            <img src="{{$choGiong->anhsp}}" alt="">
                        </div>
                        <div class="product__sale">
                            <div>
                                @if($choGiong->giamgia)
                                -{{$choGiong->giamgia}}%
                                @else Mới
                                @endif
                            </div>
                        </div>

                        <div class="product__content">
                            <div class="product__title">
                                {{$choGiong->tensp}}
                            </div>

                            <div class="product__pride-oldPride">
                                <span class="Price">
                                    <bdi>
                                        {{ number_format($choGiong->giasp, 0, ',', '.') }}
                                        <span class="currencySymbol">₫</span>
                                    </bdi>
                                </span>
                            </div>

                            <div class="product__pride-newPride">
                                <span class="Price">
                                    <bdi>
                                        {{ number_format($choGiong->giakhuyenmai, 0, ',', '.') }}
                                        <span class="currencySymbol">₫</span>
                                    </bdi>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="cat">
        <div class="row">
            @foreach($meoGiongs as $meoGiong)
            <div class="col-lg-2_5 col-md-4 col-6 post2">
                <a href="{{ route('detail', ['id' => $meoGiong->id_sanpham]) }}">
                    <div class="product">
                        <div class="product__img">
                            <img src="{{$meoGiong->anhsp}}" alt="">
                        </div>
                        <div class="product__sale">
                            <div>
                                @if($meoGiong->giamgia)
                                -{{$meoGiong->giamgia}}%
                                @else Mới
                                @endif
                            </div>
                        </div>

                        <div class="product__content">
                            <div class="product__title">
                                {{$meoGiong->tensp}}
                            </div>

                            <div class="product__pride-oldPride">
                                <span class="Price">
                                    <bdi>
                                        {{ number_format($meoGiong->giasp, 0, ',', '.') }}
                                        <span class="currencySymbol">₫</span>
                                    </bdi>
                                </span>
                            </div>

                            <div class="product__pride-newPride">
                                <span class="Price">
                                    <bdi>
                                        {{ number_format($meoGiong->giakhuyenmai, 0, ',', '.') }}
                                        <span class="currencySymbol">₫</span>
                                    </bdi>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection