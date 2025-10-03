<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
     * One-to-many relationship with Quote
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    /**
     * One-to-many relationship with Sale
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
