<?php
namespace App\Repositories;

interface IDanhmucRepository{
    public function allDanhmuc();
    public function storeDanhmuc($data);
    public function findDanhmuc($id);
    public function updateDanhmuc($data, $id);
    public function deleteDanhmuc($id);
}