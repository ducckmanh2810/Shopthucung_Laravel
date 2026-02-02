@extends('admin_layout')
@section('admin_content')
<h1 class="h3 mb-3"><strong>Thêm danh mục</strong></h1>

    <div class="err">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="POST" action="{{ route('danhmuc.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="danhmuc" class="form-label">Tên danh mục:</label>
            <input type="text" class="form-control" id="danhmuc" name="ten_danhmuc" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Gửi</button>
        &nbsp;<a class="btn btn-secondary" href="{{URL::to('/admin/danhmuc')}}">Hủy</a>
    </form>
    
@endsection