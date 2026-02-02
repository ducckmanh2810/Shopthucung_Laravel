<?php
namespace App\Repositories;

use App\Repositories\IDanhmucRepository;
use App\Models\Danhmuc;

class DanhmucRepository implements IDanhmucRepository{

    public function allDanhmuc(){
        return Danhmuc::all();
    }
    public function storeDanhmuc($data){
        Danhmuc::create($data);
    }
    public function findDanhmuc($id){
        return Danhmuc::where('id_danhmuc', $id)->first();
    }
    public function updateDanhmuc($data, $id){
        $this->findDanhmuc($id)->update($data);
    }
    public function deleteDanhmuc($id){
        $this->findDanhmuc($id)->delete();
    }
}