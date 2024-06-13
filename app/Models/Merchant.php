<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    public function store()
    {
        return $this->belongsToMany(Store::class, 'pivot_merchant_store');
    }
}
