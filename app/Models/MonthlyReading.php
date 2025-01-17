<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyReading extends Model
{
    protected $table = 'monthly_readings';

    protected $fillable = [
        'meter_id','reading_date','previous_reading','current_reading','water_usage'
    ];

    public function meter()
    {
        return $this->belongsTo(WaterMeter::class ,'meter_id');
    }
}
