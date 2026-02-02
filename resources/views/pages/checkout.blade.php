@extends('layout')
@section('content')

<form class="body" action="{{route('dathang')}}" method="POST" id="checkout" enctype="multipart/form-data">
    @csrf

    @foreach ($showusers as $key => $showuser)
        @if ($key == 0)
        <div class="mb-3 bg-light p-3 my-3">
            <h4>Thông tin khách hàng</h4>
            <div class="d-flex">
                <div class="mr-4">
                    <div style="font-size: 18px;"><strong>Khách hàng:</strong> {{$showuser->hoten}}</div>
                    <div style="font-size: 18px;"><strong>Email:</strong> {{$showuser->email}}</div>
                </div>
                <div class="">
                    <div style="font-size: 18px;"><strong>Số điện thoại:</strong> {{$showuser->sdt}}</div>
                    <div style="font-size: 18px;"><strong>Địa chỉ:</strong> {{$showuser->diachi}}</div>
                </div>

                <input type="hidden" name="id_kh" value="{{$showuser->id_kh}}">
                <input type="hidden" name="hoten" value="{{$showuser->hoten}}">
                <input type="hidden" name="email" value="{{$showuser->email}}">
                <input type="hidden" name="sdt" value="{{$showuser->sdt}}">
                <input type="hidden" name="diachigiaohang" value="{{$showuser->diachi}}">
                <input type="hidden" name="ngaydathang" value="">
            </div>
        </div>
        @endif
    @endforeach

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>Ảnh sp</th>
            <th>Tên sp</th>
            <th>Giá gốc</th>
            <th>Giảm giá</th>
            <th>Giá khuyến mại</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        </thead>
            <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['giakhuyenmai'] * $details['quantity'] @endphp

                    <tr data-id="{{ $id }}">
                        <td><img src="{{ asset($details['anhsp']) }}" width="100" height="100" class="img-responsive"/></td>
                        <td>
                            <div>{{ $details['tensp'] }}</div>
                        </td>  
                        <td data-th="Price">{{ $details['giasp'] }}</td>
                        <td data-th="Price">{{ $details['giamgia'] }}%</td>
                        <td data-th="Subtotal" class="text-center">{{ $details['giakhuyenmai']}}đ</td>

                        <td data-th="Quantity" class="quantity-input">
                            {{$details['quantity']}}
                        </td>

                        <td data-th="" class="text-center">{{ $details['giakhuyenmai'] * $details['quantity'] }}đ</td>
                    </tr>

                    <input type="hidden" name="id_sanpham" value="{{$details['id_sanpham']}}">
                    <input type="hidden" name="tensp" value="{{ $details['tensp'] }}">
                    <input type="hidden" name="giatien" value="{{$details['giasp']}}">
                    <input type="hidden" name="giamgia" value="{{$details['giamgia']}}">
                    <input type="hidden" name="giakhuyenmai" value="{{$details['giakhuyenmai']}}">
                    <input type="hidden" name="soluong" value="{{$details['quantity']}}">

                @endforeach
            @endif
        </tbody>

        <tfoot>

            <tr>
                <td colspan="7" class="bg-light">
                    <div  class="d-flex justify-content-between">
                        <h4 class="pttt">Phương thức thanh toán</h4>
                        <div>
                            <div class="d-flex align-items-center p-2">
                                <input type="radio" id="cod" name="redirect" value="COD" checked>
                                <label for="cod" style="margin-bottom: 1px; margin-left: 5px; font-size: 20px;" class="paymentContent font-weight-bold text-xl p">
                                    Trả tiền khi nhận hàng (COD)
                                </label>
                            </div>

                            <div class="d-flex align-items-center p-2">
                                <input type="radio" id="vnpay" name="redirect" value="VNPAY">
                                <label for="vnpay" style="margin-bottom: 1px; margin-left: 5px; font-size: 20px;" class="paymentContent font-weight-bold text-xl p">
                                    Thanh toán online (VNPAY)
                                </label>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>

            <tr>
            <td colspan="7" class="text-right">
                <h3 class="d-flex justify-content-end align-items-center">
                    Tổng thanh toán &nbsp;<div class="text-danger" style="font-size: 40px;">{{ number_format($total, 0, ',', '.') }}đ</div>
                    <input type="hidden" name="tongtien" value="{{$total}}">
                </h3>
            </td>
            </tr>

            <tr>
                <td colspan="7" class="text-right">
                    <a href="{{ url('/cart') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Quay lại giỏ hàng</a>
                    <button type="submit" class="btn btn-success text-white">Đặt hàng</button>
                </td>
            </tr>

        </tfoot>
        </table>
</form>

<script>
    //cod
    $('#cod').click(function () {
        // $('#cod').attr('value', 'COD');
        $('#checkout').attr('action', "{{route('dathang')}}");
    });

    //chuyen khoan vnpay
    $('#vnpay').click(function () {
        // $('#vnpay').attr('value', 'VNPAY');
        $('#checkout').attr('action', "{{route('vnpay')}}");

    });

</script>

@endsection

