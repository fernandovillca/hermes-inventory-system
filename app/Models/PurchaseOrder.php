<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'voucher_type',
        'series',
        'correlative',
        'date',
        'supplier_id',
        'total',
        'observations',
    ];
}
