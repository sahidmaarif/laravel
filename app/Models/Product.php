<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     * These attributes can be filled in bulk (e.g., via mass assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_category_id',
        'name',
        'description',
        'price',
        'stock',
    ];

    /**
     * Define the relationship: Product belongs to ProductCategory.
     * A product belongs to exactly one category.
     *
     * @return BelongsTo The relationship instance
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}

