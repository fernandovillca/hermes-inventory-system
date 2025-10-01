<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'voucher_type',
        'series',
        'correlative',
        'date',
        'customer_id',
        'total',
        'observations',
    ];
}
