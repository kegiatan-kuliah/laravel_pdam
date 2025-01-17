<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'customer_id','reading_id', 'bill_date','due_date','total_amount','status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function reading()
    {
        return $this->belongsTo(MonthlyReading::class ,'reading_id');
    }
}
