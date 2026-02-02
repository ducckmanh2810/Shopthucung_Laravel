@extends('admin_layout')
@section('admin_content')
<h1 class="h3 mb-3"><strong>Sửa sản phẩm</strong></h1>

    <div class="err">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>


    <form method="POST" action="{{ route('product.update', ['product' => $product->id_sanpham]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="name" name="tensp" value="{{$product->tensp}}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image" name="anhsp" accept="image/*" value="{{$product->anhsp}}">
            <input type="hidden" name="anhsp1" value="{{$product->anhsp}}">
        </div>

        <div id="imagePreview" class="mb-3"><img src="{{asset($product->anhsp)}}" height="200" alt=""></div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" class="form-control" id="price" name="giasp" value="{{$product->giasp}}" required>
        </div>

        <div class="mb-3">
            <label for="mota" class="form-label">Mô tả:</label>
            <textarea class="form-control" id="mota" name="mota" rows="3">{{$product->mota}}</textarea>
        </div>

        <div class="mb-3">
            <label for="giamgia" class="form-label">Giảm giá</label>
            <input type="number" class="form-control" id="giamgia" name="giamgia" min="0" max="100" value="{{$product->giamgia}}">
        </div>

        <div class="mb-3">
            <label for="qty" class="form-label">Số lượng:</label>
            <input type="number" class="form-control" id="qty" name="soluong" value="{{$product->soluong}}" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Danh mục:</label>
            <select name="id_danhmuc" class="form-select">
                <option value="{{$product->id_danhmuc}}" selected>{{$product->Danhmuc->ten_danhmuc}}</option>

                <option disabled>-----------------------</option>

                @foreach ($list_danhmucs as $danhmuc)
                    <option value="{{ $danhmuc->id_danhmuc }}">{{ $danhmuc->ten_danhmuc }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <input type="submit" class="btn btn-primary" value="Update">
            &nbsp;<a class="btn btn-secondary" href="{{URL::to('/admin/product')}}">Hủy</a>
        </div>
    </form>

    <script>
        document.getElementById('image').addEventListener('change', function() {
            const file = this.files[0];
            const reader = new FileReader();
    
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
    
                // Đặt chiều cao của hình ảnh
                img.style.height = '200px';
    
                document.getElementById('imagePreview').innerHTML = '';
                document.getElementById('imagePreview').appendChild(img);
            };
    
            reader.readAsDataURL(file);
        });
    </script>
@endsection