@extends('admin_layout')
@section('admin_content')
<h1 class="h3 mb-3"><strong>Thêm sản phẩm</strong></h1>

    <div class="err">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="name" name="tensp" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image" name="anhsp" accept="image/*" required>
        </div>

        <div id="imagePreview" class="mb-3"></div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" class="form-control" id="price" name="giasp" required>
        </div>

        <div class="mb-3">
            <label for="mota" class="form-label">Mô tả:</label>
            <textarea class="form-control" id="mota" name="mota" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="giamgia" class="form-label">Giảm giá</label>
            <input type="number" class="form-control" id="giamgia" name="giamgia" min="0" max="100">
        </div>

        <div class="mb-3">
            <label for="qty" class="form-label">Số lượng:</label>
            <input type="number" class="form-control" id="qty" name="soluong" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Danh mục:</label>
            <select name="id_danhmuc" class="form-select">
                <option value="">Chọn danh mục</option>
                @foreach ($list_danhmucs as $danhmuc)
                    <option value="{{ $danhmuc->id_danhmuc }}">{{ $danhmuc->ten_danhmuc }}</option>
                @endforeach
            </select>
        </div>
        
    
        <button type="submit" class="btn btn-primary">Gửi</button>
        &nbsp;<a class="btn btn-secondary" href="{{URL::to('/admin/product')}}">Hủy</a>
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