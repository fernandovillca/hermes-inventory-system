<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [
        'type',
        'series',
        'correlative',
        'date',
        'warehouse_id',
        'total',
        'observations',
        'reason_id',
    ];

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
