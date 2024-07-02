<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyRule extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'min_quantity', 'max_quantity'];

    // Relación con el producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
