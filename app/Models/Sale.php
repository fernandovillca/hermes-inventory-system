<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'voucher_type',
        'series',
        'correlative',
        'date',
        'quote_id',
        'customer_id',
        'warehouse_id',
        'total',
        'observations',
    ];
}
