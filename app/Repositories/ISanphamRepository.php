<?php
namespace App\Repositories;

interface ISanphamRepository{
    public function allProduct();
    public function relatedProduct();
    public function randomProduct();
    public function dogProduct();
    public function catProduct();
    public function choGiong();
    public function meoGiong();
    public function searchProduct($data);
    public function viewAllWithPagi();
}