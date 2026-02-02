<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id_dathang
 * @property int      $id_dathang
 * @property int      $id_kh
 * @property int      $id_dathang
 * @property int      $id_kh
 * @property int      $id_dathang
 * @property int      $id_kh
 * @property int      $tongtien
 * @property int      $id_kh
 * @property int      $tongtien
 * @property int      $tongtien
 * @property int      $tongtien
 * @property string   $madathang
 * @property string   $makh
 * @property string   $madathang
 * @property string   $makh
 * @property string   $phuongthucthanhtoan
 * @property string   $diachigiaohang
 * @property string   $trangthai
 * @property string   $trangthai
 * @property string   $trangthai
 * @property string   $giaohang
 * @property string   $phuongthucthanhtoan
 * @property string   $diachigiaohang
 * @property string   $trangthai
 * @property DateTime $ngaydathang
 * @property DateTime $ngaygiaohang
 * @property DateTime $ngaydathang
 * @property DateTime $ngaydathang
 * @property DateTime $ngaydathang
 * @property DateTime $ngaygiaohang
 */
class Dathang extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dathang';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_dathang';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'madathang', 'makh', 'id_kh', 'madathang', 'makh', 'id_kh', 'id_kh', 'ngaydathang', 'ngaygiaohang', 'tongtien', 'phuongthucthanhtoan', 'diachigiaohang', 'trangthai', 'id_kh', 'trangthai', 'tongtien', 'ngaydathang', 'trangthai', 'tongtien', 'ngaydathang', 'giaohang', 'ngaydathang', 'ngaygiaohang', 'tongtien', 'phuongthucthanhtoan', 'diachigiaohang', 'trangthai'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_dathang' => 'int', 'id_dathang' => 'int', 'madathang' => 'string', 'makh' => 'string', 'id_kh' => 'int', 'id_dathang' => 'int', 'madathang' => 'string', 'makh' => 'string', 'id_kh' => 'int', 'id_dathang' => 'int', 'id_kh' => 'int', 'ngaydathang' => 'datetime', 'ngaygiaohang' => 'datetime', 'tongtien' => 'int', 'phuongthucthanhtoan' => 'string', 'diachigiaohang' => 'string', 'trangthai' => 'string', 'id_kh' => 'int', 'trangthai' => 'string', 'tongtien' => 'int', 'ngaydathang' => 'datetime', 'trangthai' => 'string', 'tongtien' => 'int', 'ngaydathang' => 'datetime', 'giaohang' => 'string', 'ngaydathang' => 'datetime', 'ngaygiaohang' => 'datetime', 'tongtien' => 'int', 'phuongthucthanhtoan' => 'string', 'diachigiaohang' => 'string', 'trangthai' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaydathang', 'ngaygiaohang', 'ngaydathang', 'ngaydathang', 'ngaydathang', 'ngaygiaohang'
    ];

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
