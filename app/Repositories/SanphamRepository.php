<?php
namespace App\Repositories;

use App\Repositories\ISanphamRepository;
use App\Models\Sanpham;

class SanphamRepository implements ISanphamRepository{

    public function allProduct()
    {
        return Sanpham::orderBy('id_sanpham', 'desc')->take(20)->get();
    }
    public function relatedProduct()
    {
        return Sanpham::orderBy('id_sanpham', 'desc')->take(10)->get();
    }
    public function randomProduct()
    {
        return Sanpham::inRandomOrder()->take(10)->get();
    }
    public function dogProduct()
    {
        return Sanpham::where('id_danhmuc', 1)->orderBy('id_sanpham', 'desc')->take(5)->get();
    }
    public function catProduct()
    {
        return Sanpham::where('id_danhmuc', 2)->orderBy('id_sanpham', 'desc')->take(5)->get();
    }
    public function choGiong()
    {
        return Sanpham::where('id_danhmuc', 6)->orderBy('id_sanpham', 'desc')->take(5)->get();
    }
    public function meoGiong()
    {
        return Sanpham::where('id_danhmuc', 7)->orderBy('id_sanpham', 'desc')->take(5)->get();
    }
    public function searchProduct($data)
    {
        $searchKeyword = $data->input('tukhoa');
        return Sanpham::where('tensp', 'like', '%' . $searchKeyword . '%')->paginate(5);
    }
    
    public function viewAllWithPagi()
    {
        return Sanpham::paginate(10);
    }
    

}