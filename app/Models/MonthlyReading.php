<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class MonthlyReading extends Model
{
    use CrudTrait;
    protected $table = 'monthly_readings';

    protected $fillable = [
        'meter_id','reading_date','previous_reading','current_reading','water_usage'
    ];

    public function waterMeter()
    {
        return $this->belongsTo(WaterMeter::class, 'meter_id');
    }
}
