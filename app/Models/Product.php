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
        'price'
    ];

    /**
     * Get the category that owns the product.
     */
    public function category () {
        return $this->belongsTo(Category::class);
    }
}
