<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'keywords'
    ];

    /**
     * Get the category that owns the product.
     */
    public function category () {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the orders that contains the product
     */
    public function orders ()
    {
        return $this->belongsToMany(Order::class);
    }
}
