@extends('admin_layout')
@section('admin_content')
<h1 class="h3 mb-3"><strong>Sửa danh mục</strong></h1>

    <div class="err">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>


    <form method="POST" action="{{ route('danhmuc.update', ['danhmuc' => $danhmuc->id_danhmuc]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục:</label>
            <input type="text" class="form-control" id="name" name="ten_danhmuc" value="{{$danhmuc->ten_danhmuc}}" required>
        </div>

        <div>
            <input type="submit" class="btn btn-primary" value="Update">
            &nbsp;<a class="btn btn-secondary" href="{{URL::to('/admin/danhmuc')}}">Hủy</a>
        </div>
    </form>

@endsection