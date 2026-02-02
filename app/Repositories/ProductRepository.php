<?php
namespace App\Repositories;

use App\Repositories\IProductRepository;
use App\Models\Sanpham;

class ProductRepository implements IProductRepository{

    public function allProduct(){
        return Sanpham::paginate(10);
    }
    public function storeProduct($data){
        Sanpham::create($data);
    }
    public function findProduct($id){
        return Sanpham::where('id_sanpham', $id)->first();
    }
    public function updateProduct($data, $id){
        $this->findProduct($id)->update($data);
    }
    public function deleteProduct($id){
        $this->findProduct($id)->delete();
    }
}