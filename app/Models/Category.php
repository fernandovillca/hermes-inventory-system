<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * One-to-many relationship with Product
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
