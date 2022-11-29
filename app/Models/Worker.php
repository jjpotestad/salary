<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class worker
 * @package App\Models
 * @version November 29, 2022, 3:28 pm UTC
 *
 * @property string $full_name
 * @property integer $ref_number
 */
class Worker extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'workers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'full_name',
        'ref_number',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'full_name' => 'string',
        'ref_number' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required',
        'ref_number' => 'required|numeric',
        'role_id' => 'required'
    ];

    /**
     * Relationships
     *
     * One to Many (Inverse)
     */
    public function role(){
        return $this->belongsTo(Role::class);
    }
    
}
