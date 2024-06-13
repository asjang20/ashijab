<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    public function merchant()
    {
        return $this->belongsToMany(Merchant::class, 'pivot_merchant_store');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
