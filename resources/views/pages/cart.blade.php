@extends('layout')
@section('content')

<style>
.quantity-input {
    display: flex;
    align-items: center;
}

.quantity-btn {
    background-color: #ff4500;
    border: none;
    color: #fff;
    cursor: pointer;
    padding: 8px 15px;
    /* Giảm padding cho nút */
    transition: background-color 0.3s ease, color 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-weight: bold;
    font-size: 14px;
}

.quantity-btn:hover {
    background-color: #ff5a1f;
}

/* Ẩn các nút mặc định của input number */
.quantity-field::-webkit-outer-spin-button,
.quantity-field::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.quantity-field:focus::-webkit-outer-spin-button,
.quantity-field:focus::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.quantity-field {
    width: 50px;
    text-align: center;
    padding: 8px 0px;
    outline: none;
    border: none;
    border-top: .px solid;
}
</style>

<div class="body">

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
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

            <tr data-id="{{ $id }}" data-price="{{ $details['giakhuyenmai'] }}">
                <td><img src="{{ asset($details['anhsp']) }}" width="100" height="100" class="img-responsive" /></td>
                <td>
                    <div>{{ $details['tensp'] }}</div>
                    <button class="btn btn-danger btn-sm cart_remove mt-2"><i class="fa fa-trash-o"></i> Xóa</button>
                </td>
                <td data-th="Price">{{ $details['giasp'] }}</td>
                <td data-th="Price">{{ $details['giamgia'] }}%</td>
                <td data-th="Subtotal" class="text-center">{{ $details['giakhuyenmai']}}đ</td>

                <td data-th="Quantity" class="quantity-input">
                    <button class="quantity-btn decreaseValue">-</button>
                    <input class="quantity-field quantity cart_update" type="number" min="1" max="999"
                        value="{{$details['quantity']}}">
                    <button class="quantity-btn increaseValue">+</button>
                </td>

                <td data-th="" class="text-center item-subtotal">
                    {{ $details['giakhuyenmai'] * $details['quantity'] }}đ
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>

            <tr>
                <td colspan="7" class="text-right">
                    <h3 class="d-flex justify-content-end align-items-center">
                        Tổng thanh toán &nbsp;<div id="cart-total" class="text-danger" style="font-size: 40px;">
                            {{ number_format($total, 0, ',', '.') }}đ</div>
                    </h3>
                </td>
            </tr>

            <tr>
                <td colspan="7" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Tiếp tục mua
                        sắm</a>
                    <button class="btn btn-success"><a class="text-white" href="{{route('checkout')}}">Mua
                            hàng</a></button>
                </td>
            </tr>

        </tfoot>
    </table>
</div>

<script type="text/javascript">
function clampNumber(value, min, max) {
    var num = parseInt(value, 10);
    if (isNaN(num)) {
        num = min;
    }
    if (!isNaN(min) && num < min) {
        num = min;
    }
    if (!isNaN(max) && num > max) {
        num = max;
    }
    return num;
}

function formatVnd(amount) {
    return amount.toLocaleString('vi-VN') + 'đ';
}

function updateTotals() {
    var total = 0;
    document.querySelectorAll('#cart tbody tr').forEach(function(row) {
        var price = parseInt(row.getAttribute('data-price'), 10) || 0;
        var qtyInput = row.querySelector('.quantity');
        var qty = parseInt(qtyInput.value, 10) || 0;
        var subtotal = price * qty;
        var subtotalCell = row.querySelector('.item-subtotal');
        if (subtotalCell) {
            subtotalCell.textContent = formatVnd(subtotal);
        }
        total += subtotal;
    });

    var totalEl = document.getElementById('cart-total');
    if (totalEl) {
        totalEl.textContent = formatVnd(total);
    }
}

function sendUpdate(row, qty) {
    $.ajax({
        url: '{{ route('update_cart') }}',
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}',
            id: row.getAttribute('data-id'),
            quantity: qty
        },
        success: function() {
            updateTotals();
        }
    });
}

var cartTable = document.getElementById('cart');
if (cartTable) {
    cartTable.addEventListener('click', function(e) {
        var decreaseBtn = e.target.closest('.decreaseValue');
        var increaseBtn = e.target.closest('.increaseValue');
        var removeBtn = e.target.closest('.cart_remove');

        if (!decreaseBtn && !increaseBtn && !removeBtn) {
            return;
        }

        e.preventDefault();

        var row = e.target.closest('tr');
        if (!row) {
            return;
        }

        if (removeBtn) {
            if (confirm("Bạn có thật sự muốn xóa?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: row.getAttribute('data-id')
                    },
                    success: function() {
                        row.remove();
                        updateTotals();
                    }
                });
            }
            return;
        }

        var qtyInput = row.querySelector('.quantity');
        if (!qtyInput) {
            return;
        }

        var min = parseInt(qtyInput.getAttribute('min'), 10);
        var max = parseInt(qtyInput.getAttribute('max'), 10);
        var current = clampNumber(qtyInput.value, min, max);
        var next = current + (increaseBtn ? 1 : -1);
        next = clampNumber(next, min, max);
        qtyInput.value = next;

        sendUpdate(row, next);
    });

    cartTable.addEventListener('change', function(e) {
        var input = e.target.closest('.cart_update');
        if (!input) {
            return;
        }

        var row = input.closest('tr');
        if (!row) {
            return;
        }

        var min = parseInt(input.getAttribute('min'), 10);
        var max = parseInt(input.getAttribute('max'), 10);
        var next = clampNumber(input.value, min, max);
        input.value = next;

        sendUpdate(row, next);
    });
}
</script>

@endsection
