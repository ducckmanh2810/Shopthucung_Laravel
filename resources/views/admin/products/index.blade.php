@extends('admin_layout')
@section('admin_content')
<h1 class="h3 mb-3"><strong>Danh sách sản phẩm</strong></h1>

<div class="">
    @if(session()->has('success'))
        <div class="alert alert-success mb-3" role="alert">
            {{session('success')}}
        </div>
    @endif
</div>

<div class="d-flex justify-content-between">
  <a class="btn btn-primary" href="{{route('product.create')}}">Thêm sản phẩm</a>

  <form action="{{route('adminSearch')}}" method="GET" class="d-flex">
      <input type="text" value="" placeholder="Nhập để tìm kiếm..." name="tukhoa" class="form-control" style="width: unset;" required>
      <button class="btn btn-primary" type="submit">
        <i class="align-middle" data-feather="search"></i> 
      </button>
  </form>

</div>


<table class="table">
<thead>
  <tr>
    <th>Tên sp</th>
    <th>Hình</th>
    <th>Số lượng</th>
    <th>giá gốc</th>
    <th>giảm giá</th>
    <th>giá khuyến mại</th>
    <th colspan="2">Actions</th>
  </tr>
</thead>
<tbody>
  @foreach($products as $product)
  <tr>
    <td>{{$product->tensp}}</td>
    <td><img src="{{ asset($product->anhsp)}}" width="120" height="120" alt=""></td>
    <td>{{$product->soluong}}</td>
    <td>{{$product->giasp}}</td>
    <td>
      @if ($product->giamgia)
        {{$product->giamgia}}%
      @endif
    </td>
    <td>{{$product->giakhuyenmai}}</td>
    <td colspan="2">
        <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-warning mb-2">Edit</a>
        <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Delete"
            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
        </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
      <li class="page-item @if($products->currentPage() === 1) disabled @endif">
          <a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a>
      </li>
      @for ($i = 1; $i <= $products->lastPage(); $i++)
          <li class="page-item @if($products->currentPage() === $i) active @endif">
              <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
          </li>
      @endfor
      <li class="page-item @if($products->currentPage() === $products->lastPage()) disabled @endif">
          <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
      </li>
  </ul>
</nav>
@endsection