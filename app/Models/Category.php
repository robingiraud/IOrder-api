<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Get the company that owns the category.
     */
    public function company ()
    {
        return $this->belongsTo(Company::class);
    }

    public function products () {
        return $this->hasMany(Product::class);
    }
}
