<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use CrudTrait;
    protected $table = 'customers';

    protected $fillable = [
        'name','email','phone','address'
    ];
}
