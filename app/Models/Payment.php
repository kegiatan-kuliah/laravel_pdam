<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use CrudTrait;
    protected $table = 'payments';

    protected $fillable = [
        'bill_id','amount','payment_date','method','status'
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }
}
