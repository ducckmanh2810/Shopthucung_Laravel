<?php
namespace App\Repositories;

interface IProductRepository{
    public function allProduct();
    public function storeProduct($data);
    public function findProduct($id);
    public function updateProduct($data, $id);
    public function deleteProduct($id);
}