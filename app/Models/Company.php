<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'keywords'
    ];

    /**
     * Get the categories for the company.
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get the orders for the company.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
