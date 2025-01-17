<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterMeter extends Model
{
    protected $table = 'water_meters';

    protected $fillable = [
        'customer_id','meter_number','installation_date','status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
