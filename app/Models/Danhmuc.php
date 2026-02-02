<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id_danhmuc
 * @property int    $id_danhmuc
 * @property int    $id_danhmuc
 * @property int    $id_danhmuc
 * @property string $ten_danhmuc
 * @property string $ten_danhmuc
 * @property string $ten_danhmuc
 * @property string $ten_danhmuc
 */
class Danhmuc extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'danhmuc';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_danhmuc';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ten_danhmuc', 'ten_danhmuc', 'ten_danhmuc', 'ten_danhmuc'
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
        'id_danhmuc' => 'int', 'id_danhmuc' => 'int', 'id_danhmuc' => 'int', 'id_danhmuc' => 'int', 'ten_danhmuc' => 'string', 'ten_danhmuc' => 'string', 'ten_danhmuc' => 'string', 'ten_danhmuc' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
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
