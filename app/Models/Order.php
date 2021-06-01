<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Get the company that owns the order.
     */
    public function company ()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the user that owns the order.
     */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the products of the order
     */
    public function products ()
    {
        return $this->belongsToMany(Product::class);
    }
}
