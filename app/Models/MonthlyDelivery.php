<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MonthlyDelivery
 * @package App\Models
 * @version November 30, 2022, 1:24 am UTC
 *
 * @property integer $count_delivery
 * @property integer $hours_worked
 * @property string $date_delivery
 */
class MonthlyDelivery extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'monthly_deliveries';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'count_delivery',
        'hours_worked',
        'date_delivery',
        'worker_id',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'count_delivery' => 'integer',
        'hours_worked' => 'integer',
        'date_delivery' => 'date',
        'worker_id' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'count_delivery' => 'required|numeric',
        'hours_worked' => 'required|numeric',
        'date_delivery' => 'required',
        'worker_id' => 'required'
    ];

    /**
     * Relationships
     *
     * One to Many (Inverse)
     */
    public function role(){
        return $this->belongsTo(Role::class);
    }

    /**
     * Relationships
     *
     * One to Many (Inverse)
     */
    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
