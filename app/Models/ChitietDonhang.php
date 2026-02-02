<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChitietDonhang extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chitiet_donhang';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_ctdonhang';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tensp', 'soluong', 'giamgia', 'giatien', 'giakhuyenmai', 'id_sanpham', 'id_dathang', 'id_kh',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_ctdonhang' => 'int', 'soluong' => 'int', 'giamgia' => 'int', 'giatien' => 'int', 'giakhuyenmai' => 'int',
        'id_sanpham' => 'int', 'id_dathang' => 'int', 'id_kh' => 'int',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['ngaydat'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
