<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use CrudTrait;
    protected $table = 'bills';

    protected $fillable = [
        'customer_id','reading_id', 'bill_date','due_date','total_amount','status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function monthlyReading()
    {
        return $this->belongsTo(MonthlyReading::class ,'reading_id');
    }

    public function export($crud = false)
    {
        return '<a class="btn btn-primary" target="_blank" href="'.route('bill.export').'">Download PDF</a>';
    }
}
