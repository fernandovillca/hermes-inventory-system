<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sku',
        'barcode',
        'price',
        'category_id',
    ];

    /**
     * Inverse one-to-many relationship with Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * One-to-many relationship with Inventory
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Polymorphic many-to-many relationship with SaleOrder
     */
    public function purchaseOrders()
    {
        return $this->morphedByMany(PurchaseOrder::class, 'productable');
    }

    /**
     * Polymorphic many-to-many relationship with Quote
     */
    public function quotes()
    {
        return $this->morphedByMany(Quote::class, 'productable');
    }

    /**
     * Polymorphic one-to-many relationship with Image
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
