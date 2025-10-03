<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'identity_id',
        'document_number',
        'name',
        'address',
        'email',
        'phone',
    ];

    /**
     * Inverse one-to-many relationship with Identity
     */
    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }

    /**
     * One-to-many relationship with Purchase
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * One-to-many relationship with PurchaseOrder
     */
    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
