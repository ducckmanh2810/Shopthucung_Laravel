<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sanpham';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_sanpham';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tensp', 'anhsp', 'giasp', 'mota', 'giamgia', 'giakhuyenmai', 'soluong', 'id_danhmuc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_sanpham' => 'int',
        'tensp' => 'string',
        'anhsp' => 'string',
        'giasp' => 'int',
        'mota' => 'string',
        'giamgia' => 'int',
        'giakhuyenmai' => 'int',
        'soluong' => 'int',
        'id_danhmuc' => 'int'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    /**
     * Relation to the danh_muc table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'id_danhmuc');
    }
}
