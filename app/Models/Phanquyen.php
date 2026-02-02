<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_phanquyen
 * @property int $id_phanquyen
 * @property int $id_phanquyen
 * @property int $id_phanquyen
 */
class Phanquyen extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phanquyen';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_phanquyen';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tenquyen', 'tenquyen', 'tenquyen', 'tenquyen'
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
        'id_phanquyen' => 'int', 'id_phanquyen' => 'int', 'id_phanquyen' => 'int', 'id_phanquyen' => 'int'
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
