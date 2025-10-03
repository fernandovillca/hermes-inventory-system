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

    /**
     * Inverse one-to-many relationship with Warehouse (origin)
     */
    public function originWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'origin_warehouse_id');
    }

    /**
     * Inverse one-to-many relationship with Warehouse (destination)
     */
    public function destinationWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'destination_warehouse_id');
    }

    /**
     * Polymorphic many-to-many relationship with Product
     */
    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')
            ->withPivot('quantity', 'price', 'subtotal')
            ->withTimestamps();
    }
}
