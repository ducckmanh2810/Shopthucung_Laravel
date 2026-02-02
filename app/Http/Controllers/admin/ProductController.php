<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Danhmuc;
use App\Http\Controllers\Controller;

use App\Repositories\IProductRepository;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct(IProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index(){
        $products = $this->productRepository->allProduct();

        return view('admin.products.index', ['products' => $products]);
    }

    public function create(){
        $list_danhmucs = Danhmuc::all();
        return view('admin.products.create', ['list_danhmucs' => $list_danhmucs]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'tensp' => 'required',
            'anhsp' => 'required',
            'giasp' => 'required|decimal:0,2',
            'mota' => 'nullable',
            'giamgia' => 'nullable',
            'giakhuyenmai' => 'nullable|decimal:0,2',
            'soluong' => 'required|numeric',
            'id_danhmuc' => 'required'
        ]);

        // Lưu hình ảnh vào thư mục frontend/uploads
        $imagePath = $request->file('anhsp')->store('upload', 'public_frontend');
        
        // Lấy tên file hình ảnh
        $imageName = pathinfo($imagePath, PATHINFO_FILENAME);

        // Lấy đuôi file hình ảnh
        $imageExtension = $request->file('anhsp')->getClientOriginalExtension();

        // Tạo đường dẫn đầy đủ cho hình ảnh
        $imageUrl = "frontend/upload/{$imageName}.{$imageExtension}";

        // Thêm đường dẫn hình ảnh vào dữ liệu được xác nhận
        $validatedData['anhsp'] = $imageUrl;

        //tinh giam gia
        $giagoc = $validatedData['giasp'];
        $giamgia = $validatedData['giamgia'];

        $tinh = ($giagoc * $giamgia) / 100;
        $validatedData['giakhuyenmai'] = $giagoc - $tinh;

        $this->productRepository->storeProduct($validatedData);

        return redirect()->route('product.index');
    }

    public function edit($id){
        $list_danhmucs = Danhmuc::all();
        $product = $this->productRepository->findProduct($id);
        return view('admin.products.edit', ['product' => $product, 'list_danhmucs' => $list_danhmucs]);
    }

    public function update($id, Request $request){
        $validatedData = $request->validate([
            'tensp' => 'required',
            'anhsp' => 'nullable',
            'giasp' => 'required|decimal:0,2',
            'mota' => 'nullable',
            'giamgia' => 'nullable',
            'giakhuyenmai' => 'nullable|decimal:0,2',
            'soluong' => 'required|numeric',
            'id_danhmuc' => 'required'
        ]);

        // Lưu hình ảnh vào thư mục frontend/uploads
        if($request->file('anhsp')){
            $imagePath = $request->file('anhsp')->store('upload', 'public_frontend');
            
            // Lấy tên file hình ảnh
            $imageName = pathinfo($imagePath, PATHINFO_FILENAME);

            // Lấy đuôi file hình ảnh
            $imageExtension = $request->file('anhsp')->getClientOriginalExtension();

            // Tạo đường dẫn đầy đủ cho hình ảnh
            $imageUrl = "frontend/upload/{$imageName}.{$imageExtension}";

        }
        else{
            $imageUrl = $request->anhsp1;
        }
        
        // Thêm đường dẫn hình ảnh vào dữ liệu được xác nhận
        $validatedData['anhsp'] = $imageUrl;

        //tinh giam gia
        $giagoc = $validatedData['giasp'];
        $giamgia = $validatedData['giamgia'];

        $tinh = ($giagoc * $giamgia) / 100;
        $validatedData['giakhuyenmai'] = $giagoc - $tinh;

        $this->productRepository->updateProduct($validatedData, $id);

        return redirect()->route('product.index')->with('success', 'Cập nhập sản phẩm thành công');
    }

    public function destroy($id){
        $this->productRepository->deleteProduct($id);

        return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công');
    }

}
