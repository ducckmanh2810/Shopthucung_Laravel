<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sanpham;

use App\Repositories\ISanphamRepository;

class HomeController extends Controller
{

    private $sanphamRepository;

    public function __construct(ISanphamRepository $sanphamRepository) {
        $this->sanphamRepository = $sanphamRepository;
    }

    public function index(){
        $alls = $this->sanphamRepository->allProduct();
        $sanphams = $this->sanphamRepository->relatedProduct();
        $dogproducts = $this->sanphamRepository->dogProduct();
        $catproducts = $this->sanphamRepository->catProduct();
        $choGiongs = $this->sanphamRepository->choGiong();
        $meoGiongs = $this->sanphamRepository->meoGiong();
        return view('pages.home', [
            'alls' => $alls,
            'sanphams' => $sanphams,
            'dogproducts' => $dogproducts,
            'catproducts' => $catproducts,
            'choGiongs' => $choGiongs,
            'meoGiongs' => $meoGiongs,
        ]);
    }

    public function congiong(){
        $choGiongs = $this->sanphamRepository->choGiong();
        $meoGiongs = $this->sanphamRepository->meoGiong();

        return view('pages.congiong', [
            'choGiongs' => $choGiongs,
            'meoGiongs' => $meoGiongs,
        ]);
    }

    public function detail($id){
        // Lấy thông tin của sản phẩm dựa trên $id
        $sanpham = Sanpham::findOrFail($id);
        $randoms = $this->sanphamRepository->randomProduct()->take(5);
        return view('pages.detail', ['sanpham' => $sanpham, 'randoms' => $randoms]);
    }
    
    public function search(Request $request){
        $searchs = $this->sanphamRepository->searchProduct($request);
        return view('pages.search')->with('searchs', $searchs)->with('tukhoa', $request->input('tukhoa'));
    }

    public function viewAll(){
        $viewAllPaginations = $this->sanphamRepository->viewAllWithPagi();
        return view('pages.viewall', ['sanphams' => $viewAllPaginations]);
    }
    public function services(){
        return view('pages.services');
    }
    
}
