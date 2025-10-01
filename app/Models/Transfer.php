<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'series',
        'correlative',
        'date',
        'total',
        'observations',
        'origin_warehouse_id',
        'destination_warehouse_id',
    ];
}
