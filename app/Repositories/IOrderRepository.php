<?php
namespace App\Repositories;

interface IOrderRepository{
    public function allOrder();
    public function findOrder($id);
    public function findDetailProduct($id);
    public function findUser($id);
    public function updateOrder($data, $id);
    
    public function orderView($id);
}