<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     * These attributes can be filled in bulk (e.g., via mass assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship: ProductCategory has many Products.
     * One category can have multiple products.
     *
     * @return HasMany The relationship instance
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
